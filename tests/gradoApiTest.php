<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class gradoApiTest extends TestCase
{
    use MakegradoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreategrado()
    {
        $grado = $this->fakegradoData();
        $this->json('POST', '/api/v1/grados', $grado);

        $this->assertApiResponse($grado);
    }

    /**
     * @test
     */
    public function testReadgrado()
    {
        $grado = $this->makegrado();
        $this->json('GET', '/api/v1/grados/'.$grado->id);

        $this->assertApiResponse($grado->toArray());
    }

    /**
     * @test
     */
    public function testUpdategrado()
    {
        $grado = $this->makegrado();
        $editedgrado = $this->fakegradoData();

        $this->json('PUT', '/api/v1/grados/'.$grado->id, $editedgrado);

        $this->assertApiResponse($editedgrado);
    }

    /**
     * @test
     */
    public function testDeletegrado()
    {
        $grado = $this->makegrado();
        $this->json('DELETE', '/api/v1/grados/'.$grado->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/grados/'.$grado->id);

        $this->assertResponseStatus(404);
    }
}
