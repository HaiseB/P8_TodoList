<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityTest extends WebTestCase
{
    public function testWrongLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSame(1, $crawler->filter('input[name="_username"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="_password"]')->count());
        $this->assertSame(1, $crawler->selectButton('Se connecter')->count());

        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'Benjamin';
        $form['_password'] = 'badCredentials';
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Invalid credentials.", $crawler->filter('div.alert.alert-danger')->text());
    }

    public function testStandardLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSame(1, $crawler->filter('input[name="_username"]')->count());
        $this->assertSame(1, $crawler->filter('input[name="_password"]')->count());
        $this->assertSame(1, $crawler->selectButton('Se connecter')->count());

        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'Benjamin';
        $form['_password'] = 'a';
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSame("Bienvenue sur Todo List, l'application vous permettant de gérer l'ensemble de vos tâches sans effort !", $crawler->filter('h1')->text());

        return $client;
    }
}