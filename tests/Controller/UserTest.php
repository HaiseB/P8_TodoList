<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserTest extends WebTestCase
{
    public function testCreateAdminUserAuthenticated()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $crawler = $client->request('GET', '/users/create');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[isAdmin]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Ajouter')->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'Administrateur';
        $form['user[password][first]'] = "demo@dmin";
        $form['user[password][second]'] = 'demo@dmin';
        $form['user[email]'] = "admn@todolist.fr";
        $form['user[isAdmin]'] = true;
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! L'utilisateur a bien été ajouté.", $crawler->filter('div.alert.alert-success')->text());
    }

    public function testCreateStandartUserAuthenticated()
    {
        $securityTest = new SecurityTest();
        $client = $securityTest->testStandardLogin();

        $crawler = $client->request('GET', '/users/create');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="user[isAdmin]"]')->count());
        $this->assertSame(1, $crawler->selectButton('Ajouter')->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'Utilisateur';
        $form['user[password][first]'] = "demo";
        $form['user[password][second]'] = 'demo';
        $form['user[email]'] = "utilisateur@todolist.fr";
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Superbe ! L'utilisateur a bien été ajouté.", $crawler->filter('div.alert.alert-success')->text());
    }
}