<?php

use App\Models\seccion;
use App\Repositories\seccionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class seccionRepositoryTest extends TestCase
{
    use MakeseccionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var seccionRepository
     */
    protected $seccionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->seccionRepo = App::make(seccionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateseccion()
    {
        $seccion = $this->fakeseccionData();
        $createdseccion = $this->seccionRepo->create($seccion);
        $createdseccion = $createdseccion->toArray();
        $this->assertArrayHasKey('id', $createdseccion);
        $this->assertNotNull($createdseccion['id'], 'Created seccion must have id specified');
        $this->assertNotNull(seccion::find($createdseccion['id']), 'seccion with given id must be in DB');
        $this->assertModelData($seccion, $createdseccion);
    }

    /**
     * @test read
     */
    public function testReadseccion()
    {
        $seccion = $this->makeseccion();
        $dbseccion = $this->seccionRepo->find($seccion->id);
        $dbseccion = $dbseccion->toArray();
        $this->assertModelData($seccion->toArray(), $dbseccion);
    }

    /**
     * @test update
     */
    public function testUpdateseccion()
    {
        $seccion = $this->makeseccion();
        $fakeseccion = $this->fakeseccionData();
        $updatedseccion = $this->seccionRepo->update($fakeseccion, $seccion->id);
        $this->assertModelData($fakeseccion, $updatedseccion->toArray());
        $dbseccion = $this->seccionRepo->find($seccion->id);
        $this->assertModelData($fakeseccion, $dbseccion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteseccion()
    {
        $seccion = $this->makeseccion();
        $resp = $this->seccionRepo->delete($seccion->id);
        $this->assertTrue($resp);
        $this->assertNull(seccion::find($seccion->id), 'seccion should not exist in DB');
    }
}
