<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class boletaApiTest extends TestCase
{
    use MakeboletaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateboleta()
    {
        $boleta = $this->fakeboletaData();
        $this->json('POST', '/api/v1/boletas', $boleta);

        $this->assertApiResponse($boleta);
    }

    /**
     * @test
     */
    public function testReadboleta()
    {
        $boleta = $this->makeboleta();
        $this->json('GET', '/api/v1/boletas/'.$boleta->id);

        $this->assertApiResponse($boleta->toArray());
    }

    /**
     * @test
     */
    public function testUpdateboleta()
    {
        $boleta = $this->makeboleta();
        $editedboleta = $this->fakeboletaData();

        $this->json('PUT', '/api/v1/boletas/'.$boleta->id, $editedboleta);

        $this->assertApiResponse($editedboleta);
    }

    /**
     * @test
     */
    public function testDeleteboleta()
    {
        $boleta = $this->makeboleta();
        $this->json('DELETE', '/api/v1/boletas/'.$boleta->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/boletas/'.$boleta->id);

        $this->assertResponseStatus(404);
    }
}
