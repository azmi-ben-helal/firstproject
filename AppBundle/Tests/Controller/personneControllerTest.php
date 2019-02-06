<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class personneControllerTest extends WebTestCase
{
    public function testCvs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cvs');
    }

}
