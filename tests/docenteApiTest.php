<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class docenteApiTest extends TestCase
{
    use MakedocenteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedocente()
    {
        $docente = $this->fakedocenteData();
        $this->json('POST', '/api/v1/docentes', $docente);

        $this->assertApiResponse($docente);
    }

    /**
     * @test
     */
    public function testReaddocente()
    {
        $docente = $this->makedocente();
        $this->json('GET', '/api/v1/docentes/'.$docente->id);

        $this->assertApiResponse($docente->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedocente()
    {
        $docente = $this->makedocente();
        $editeddocente = $this->fakedocenteData();

        $this->json('PUT', '/api/v1/docentes/'.$docente->id, $editeddocente);

        $this->assertApiResponse($editeddocente);
    }

    /**
     * @test
     */
    public function testDeletedocente()
    {
        $docente = $this->makedocente();
        $this->json('DELETE', '/api/v1/docentes/'.$docente->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/docentes/'.$docente->id);

        $this->assertResponseStatus(404);
    }
}
