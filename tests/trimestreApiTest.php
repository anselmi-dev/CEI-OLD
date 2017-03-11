<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class trimestreApiTest extends TestCase
{
    use MaketrimestreTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetrimestre()
    {
        $trimestre = $this->faketrimestreData();
        $this->json('POST', '/api/v1/trimestres', $trimestre);

        $this->assertApiResponse($trimestre);
    }

    /**
     * @test
     */
    public function testReadtrimestre()
    {
        $trimestre = $this->maketrimestre();
        $this->json('GET', '/api/v1/trimestres/'.$trimestre->id);

        $this->assertApiResponse($trimestre->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetrimestre()
    {
        $trimestre = $this->maketrimestre();
        $editedtrimestre = $this->faketrimestreData();

        $this->json('PUT', '/api/v1/trimestres/'.$trimestre->id, $editedtrimestre);

        $this->assertApiResponse($editedtrimestre);
    }

    /**
     * @test
     */
    public function testDeletetrimestre()
    {
        $trimestre = $this->maketrimestre();
        $this->json('DELETE', '/api/v1/trimestres/'.$trimestre->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/trimestres/'.$trimestre->id);

        $this->assertResponseStatus(404);
    }
}
