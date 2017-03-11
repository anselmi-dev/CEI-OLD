<?php

use App\Models\grado;
use App\Repositories\gradoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class gradoRepositoryTest extends TestCase
{
    use MakegradoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var gradoRepository
     */
    protected $gradoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->gradoRepo = App::make(gradoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreategrado()
    {
        $grado = $this->fakegradoData();
        $createdgrado = $this->gradoRepo->create($grado);
        $createdgrado = $createdgrado->toArray();
        $this->assertArrayHasKey('id', $createdgrado);
        $this->assertNotNull($createdgrado['id'], 'Created grado must have id specified');
        $this->assertNotNull(grado::find($createdgrado['id']), 'grado with given id must be in DB');
        $this->assertModelData($grado, $createdgrado);
    }

    /**
     * @test read
     */
    public function testReadgrado()
    {
        $grado = $this->makegrado();
        $dbgrado = $this->gradoRepo->find($grado->id);
        $dbgrado = $dbgrado->toArray();
        $this->assertModelData($grado->toArray(), $dbgrado);
    }

    /**
     * @test update
     */
    public function testUpdategrado()
    {
        $grado = $this->makegrado();
        $fakegrado = $this->fakegradoData();
        $updatedgrado = $this->gradoRepo->update($fakegrado, $grado->id);
        $this->assertModelData($fakegrado, $updatedgrado->toArray());
        $dbgrado = $this->gradoRepo->find($grado->id);
        $this->assertModelData($fakegrado, $dbgrado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletegrado()
    {
        $grado = $this->makegrado();
        $resp = $this->gradoRepo->delete($grado->id);
        $this->assertTrue($resp);
        $this->assertNull(grado::find($grado->id), 'grado should not exist in DB');
    }
}
