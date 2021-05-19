<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskTest extends WebTestCase
{
    public function testDisplayTasksUnauthenticated()
    {
        $client = static::createClient();
        $client->request('GET', '/tasks');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(1, $crawler->selectButton('Se connecter')->count());
    }

    public function testDisplayTasksAuthenticated()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $client->request('GET', '/tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testCreateTaskAuthenticated()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $crawler = $client->request('GET', '/tasks/create');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertSame(1, $crawler->filter('textarea[name="task[content]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Ajouter')->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'Tester la création de tâche';
        $form['task[content]'] = "Rien n'est cassé?";
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! La tâche a été bien été ajoutée.", $crawler->filter('div.alert.alert-success')->text());
    }

    public function testEditTaskWhereUserIsAuthor()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testAdministratorLogin();

        $crawler = $client->request('GET', '/tasks/16/edit');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSame(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertSame(1, $crawler->filter('textarea[name="task[content]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Modifier')->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Test de la modification de la tâche';
        $form['task[content]'] = 'Biensur que ca fonctionne! :)';
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! La tâche a bien été modifiée.", $crawler->filter('div.alert.alert-success')->text());
    }

    public function testEditTaskWhereUserIsNotAuthor()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testAdministratorLogin();

        $client->request('GET', '/tasks/2/edit');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(
            "Oops ! Modification impossible, cette tâche ne vous appartiens pas.",
            $crawler->filter('div.alert.alert-danger')->text()
        );
    }

    public function testDeleteTaskWhereUserIsAuthor()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testAdministratorLogin();

        $client->request('GET', '/tasks/16/delete');

        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! La tâche a bien été supprimée.", $crawler->filter('div.alert.alert-success')->text());
    }

    public function testDeleteTaskWhereUserIsNotAuthor()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testAdministratorLogin();

        $client->request('GET', '/tasks/2/delete');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(
            "Oops ! Échec de la suppression, cette tâche ne vous appartiens pas.",
            $crawler->filter('div.alert.alert-danger')->text()
        );
    }

    public function testEditAnonymTaskWhileLoggedAdmin()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testAdministratorLogin();

        $crawler = $client->request('GET', '/tasks/32/edit');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSame(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertSame(1, $crawler->filter('textarea[name="task[content]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Modifier')->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = "Test de la modification de la tâche anonyme";
        $form['task[content]'] = 'Biensur que ca fonctionne aussi! :)';
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! La tâche a bien été modifiée.", $crawler->filter('div.alert.alert-success')->text());
    }

    public function testEditAnonymTaskWhileLoggedAsStandardUser()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $client->request('GET', '/tasks/32/edit');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(
            "Oops ! Modification impossible, cette tâche ne vous appartiens pas.",
            $crawler->filter('div.alert.alert-danger')->text()
        );
    }

}