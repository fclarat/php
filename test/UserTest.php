<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    private $client;

    public function setUp()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
        $dotenv->load();
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => getenv('TEST_BASE_URI')
        ]);
    }

    public function testGetUsers()
    {
        $response = $this->client->get('/users');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUserWithId1()
    {
        $response = $this->client->get('/user?id=1');
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('name', $data[0]);
        $this->assertArrayHasKey('address', $data[0]);
        $this->assertArrayHasKey('picture', $data[0]);
    }
}
