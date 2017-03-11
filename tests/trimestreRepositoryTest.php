<?php

use App\Models\trimestre;
use App\Repositories\trimestreRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class trimestreRepositoryTest extends TestCase
{
    use MaketrimestreTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var trimestreRepository
     */
    protected $trimestreRepo;

    public function setUp()
    {
        parent::setUp();
        $this->trimestreRepo = App::make(trimestreRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetrimestre()
    {
        $trimestre = $this->faketrimestreData();
        $createdtrimestre = $this->trimestreRepo->create($trimestre);
        $createdtrimestre = $createdtrimestre->toArray();
        $this->assertArrayHasKey('id', $createdtrimestre);
        $this->assertNotNull($createdtrimestre['id'], 'Created trimestre must have id specified');
        $this->assertNotNull(trimestre::find($createdtrimestre['id']), 'trimestre with given id must be in DB');
        $this->assertModelData($trimestre, $createdtrimestre);
    }

    /**
     * @test read
     */
    public function testReadtrimestre()
    {
        $trimestre = $this->maketrimestre();
        $dbtrimestre = $this->trimestreRepo->find($trimestre->id);
        $dbtrimestre = $dbtrimestre->toArray();
        $this->assertModelData($trimestre->toArray(), $dbtrimestre);
    }

    /**
     * @test update
     */
    public function testUpdatetrimestre()
    {
        $trimestre = $this->maketrimestre();
        $faketrimestre = $this->faketrimestreData();
        $updatedtrimestre = $this->trimestreRepo->update($faketrimestre, $trimestre->id);
        $this->assertModelData($faketrimestre, $updatedtrimestre->toArray());
        $dbtrimestre = $this->trimestreRepo->find($trimestre->id);
        $this->assertModelData($faketrimestre, $dbtrimestre->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetrimestre()
    {
        $trimestre = $this->maketrimestre();
        $resp = $this->trimestreRepo->delete($trimestre->id);
        $this->assertTrue($resp);
        $this->assertNull(trimestre::find($trimestre->id), 'trimestre should not exist in DB');
    }
}
