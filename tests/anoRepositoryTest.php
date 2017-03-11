<?php

use App\Models\ano;
use App\Repositories\anoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class anoRepositoryTest extends TestCase
{
    use MakeanoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var anoRepository
     */
    protected $anoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anoRepo = App::make(anoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateano()
    {
        $ano = $this->fakeanoData();
        $createdano = $this->anoRepo->create($ano);
        $createdano = $createdano->toArray();
        $this->assertArrayHasKey('id', $createdano);
        $this->assertNotNull($createdano['id'], 'Created ano must have id specified');
        $this->assertNotNull(ano::find($createdano['id']), 'ano with given id must be in DB');
        $this->assertModelData($ano, $createdano);
    }

    /**
     * @test read
     */
    public function testReadano()
    {
        $ano = $this->makeano();
        $dbano = $this->anoRepo->find($ano->id);
        $dbano = $dbano->toArray();
        $this->assertModelData($ano->toArray(), $dbano);
    }

    /**
     * @test update
     */
    public function testUpdateano()
    {
        $ano = $this->makeano();
        $fakeano = $this->fakeanoData();
        $updatedano = $this->anoRepo->update($fakeano, $ano->id);
        $this->assertModelData($fakeano, $updatedano->toArray());
        $dbano = $this->anoRepo->find($ano->id);
        $this->assertModelData($fakeano, $dbano->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteano()
    {
        $ano = $this->makeano();
        $resp = $this->anoRepo->delete($ano->id);
        $this->assertTrue($resp);
        $this->assertNull(ano::find($ano->id), 'ano should not exist in DB');
    }
}
