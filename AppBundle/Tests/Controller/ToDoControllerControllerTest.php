<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ToDoControllerControllerTest extends WebTestCase
{
    public function testAddtodo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addToDo');
    }

    public function testResettodo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/resetToDo');
    }

}
