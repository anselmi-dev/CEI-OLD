<?php

use App\Models\boleta;
use App\Repositories\boletaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class boletaRepositoryTest extends TestCase
{
    use MakeboletaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var boletaRepository
     */
    protected $boletaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->boletaRepo = App::make(boletaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateboleta()
    {
        $boleta = $this->fakeboletaData();
        $createdboleta = $this->boletaRepo->create($boleta);
        $createdboleta = $createdboleta->toArray();
        $this->assertArrayHasKey('id', $createdboleta);
        $this->assertNotNull($createdboleta['id'], 'Created boleta must have id specified');
        $this->assertNotNull(boleta::find($createdboleta['id']), 'boleta with given id must be in DB');
        $this->assertModelData($boleta, $createdboleta);
    }

    /**
     * @test read
     */
    public function testReadboleta()
    {
        $boleta = $this->makeboleta();
        $dbboleta = $this->boletaRepo->find($boleta->id);
        $dbboleta = $dbboleta->toArray();
        $this->assertModelData($boleta->toArray(), $dbboleta);
    }

    /**
     * @test update
     */
    public function testUpdateboleta()
    {
        $boleta = $this->makeboleta();
        $fakeboleta = $this->fakeboletaData();
        $updatedboleta = $this->boletaRepo->update($fakeboleta, $boleta->id);
        $this->assertModelData($fakeboleta, $updatedboleta->toArray());
        $dbboleta = $this->boletaRepo->find($boleta->id);
        $this->assertModelData($fakeboleta, $dbboleta->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteboleta()
    {
        $boleta = $this->makeboleta();
        $resp = $this->boletaRepo->delete($boleta->id);
        $this->assertTrue($resp);
        $this->assertNull(boleta::find($boleta->id), 'boleta should not exist in DB');
    }
}
