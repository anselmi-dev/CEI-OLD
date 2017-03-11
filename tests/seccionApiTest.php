<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class seccionApiTest extends TestCase
{
    use MakeseccionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateseccion()
    {
        $seccion = $this->fakeseccionData();
        $this->json('POST', '/api/v1/seccions', $seccion);

        $this->assertApiResponse($seccion);
    }

    /**
     * @test
     */
    public function testReadseccion()
    {
        $seccion = $this->makeseccion();
        $this->json('GET', '/api/v1/seccions/'.$seccion->id);

        $this->assertApiResponse($seccion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateseccion()
    {
        $seccion = $this->makeseccion();
        $editedseccion = $this->fakeseccionData();

        $this->json('PUT', '/api/v1/seccions/'.$seccion->id, $editedseccion);

        $this->assertApiResponse($editedseccion);
    }

    /**
     * @test
     */
    public function testDeleteseccion()
    {
        $seccion = $this->makeseccion();
        $this->json('DELETE', '/api/v1/seccions/'.$seccion->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/seccions/'.$seccion->id);

        $this->assertResponseStatus(404);
    }
}
