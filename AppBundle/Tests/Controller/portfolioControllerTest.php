<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class portfolioControllerTest extends WebTestCase
{
    public function testAffichage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/affichage');
    }

}
