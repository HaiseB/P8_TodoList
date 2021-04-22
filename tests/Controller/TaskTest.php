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

        $crawler = $client->request('GET', '/tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /*public function testCreateTaskAuthenticated()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $crawler = $client->request('GET', '/tasks/create');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="task[content]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Ajouter')->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'Tester la création de tâche';
        $form['task[content]'] = "Rien n'est cassé?";
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Invalid credentials.", $crawler->filter('div.alert.alert-danger')->text());
    }*/

    /*public function testUpdateTaskAuthenticated()
    {

    }*/
}