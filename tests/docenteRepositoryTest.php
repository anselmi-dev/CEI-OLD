<?php

use App\Models\docente;
use App\Repositories\docenteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class docenteRepositoryTest extends TestCase
{
    use MakedocenteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var docenteRepository
     */
    protected $docenteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->docenteRepo = App::make(docenteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedocente()
    {
        $docente = $this->fakedocenteData();
        $createddocente = $this->docenteRepo->create($docente);
        $createddocente = $createddocente->toArray();
        $this->assertArrayHasKey('id', $createddocente);
        $this->assertNotNull($createddocente['id'], 'Created docente must have id specified');
        $this->assertNotNull(docente::find($createddocente['id']), 'docente with given id must be in DB');
        $this->assertModelData($docente, $createddocente);
    }

    /**
     * @test read
     */
    public function testReaddocente()
    {
        $docente = $this->makedocente();
        $dbdocente = $this->docenteRepo->find($docente->id);
        $dbdocente = $dbdocente->toArray();
        $this->assertModelData($docente->toArray(), $dbdocente);
    }

    /**
     * @test update
     */
    public function testUpdatedocente()
    {
        $docente = $this->makedocente();
        $fakedocente = $this->fakedocenteData();
        $updateddocente = $this->docenteRepo->update($fakedocente, $docente->id);
        $this->assertModelData($fakedocente, $updateddocente->toArray());
        $dbdocente = $this->docenteRepo->find($docente->id);
        $this->assertModelData($fakedocente, $dbdocente->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedocente()
    {
        $docente = $this->makedocente();
        $resp = $this->docenteRepo->delete($docente->id);
        $this->assertTrue($resp);
        $this->assertNull(docente::find($docente->id), 'docente should not exist in DB');
    }
}
