<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class estudianteApiTest extends TestCase
{
    use MakeestudianteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateestudiante()
    {
        $estudiante = $this->fakeestudianteData();
        $this->json('POST', '/api/v1/estudiantes', $estudiante);

        $this->assertApiResponse($estudiante);
    }

    /**
     * @test
     */
    public function testReadestudiante()
    {
        $estudiante = $this->makeestudiante();
        $this->json('GET', '/api/v1/estudiantes/'.$estudiante->id);

        $this->assertApiResponse($estudiante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateestudiante()
    {
        $estudiante = $this->makeestudiante();
        $editedestudiante = $this->fakeestudianteData();

        $this->json('PUT', '/api/v1/estudiantes/'.$estudiante->id, $editedestudiante);

        $this->assertApiResponse($editedestudiante);
    }

    /**
     * @test
     */
    public function testDeleteestudiante()
    {
        $estudiante = $this->makeestudiante();
        $this->json('DELETE', '/api/v1/estudiantes/'.$estudiante->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estudiantes/'.$estudiante->id);

        $this->assertResponseStatus(404);
    }
}
