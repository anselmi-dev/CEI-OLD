<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class anoApiTest extends TestCase
{
    use MakeanoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateano()
    {
        $ano = $this->fakeanoData();
        $this->json('POST', '/api/v1/anos', $ano);

        $this->assertApiResponse($ano);
    }

    /**
     * @test
     */
    public function testReadano()
    {
        $ano = $this->makeano();
        $this->json('GET', '/api/v1/anos/'.$ano->id);

        $this->assertApiResponse($ano->toArray());
    }

    /**
     * @test
     */
    public function testUpdateano()
    {
        $ano = $this->makeano();
        $editedano = $this->fakeanoData();

        $this->json('PUT', '/api/v1/anos/'.$ano->id, $editedano);

        $this->assertApiResponse($editedano);
    }

    /**
     * @test
     */
    public function testDeleteano()
    {
        $ano = $this->makeano();
        $this->json('DELETE', '/api/v1/anos/'.$ano->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anos/'.$ano->id);

        $this->assertResponseStatus(404);
    }
}
