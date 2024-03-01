<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testBooksByCategory()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/category/8/books');
        $responseContent = $client->getResponse()->getContent();

        //200 код
        $this->assertResponseIsSuccessful();

        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/responses/BookControllerTest_testBooksByCategory.json',
            $responseContent);
    }
}
