<?php

use App\Models\estudiante;
use App\Repositories\estudianteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class estudianteRepositoryTest extends TestCase
{
    use MakeestudianteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var estudianteRepository
     */
    protected $estudianteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estudianteRepo = App::make(estudianteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateestudiante()
    {
        $estudiante = $this->fakeestudianteData();
        $createdestudiante = $this->estudianteRepo->create($estudiante);
        $createdestudiante = $createdestudiante->toArray();
        $this->assertArrayHasKey('id', $createdestudiante);
        $this->assertNotNull($createdestudiante['id'], 'Created estudiante must have id specified');
        $this->assertNotNull(estudiante::find($createdestudiante['id']), 'estudiante with given id must be in DB');
        $this->assertModelData($estudiante, $createdestudiante);
    }

    /**
     * @test read
     */
    public function testReadestudiante()
    {
        $estudiante = $this->makeestudiante();
        $dbestudiante = $this->estudianteRepo->find($estudiante->id);
        $dbestudiante = $dbestudiante->toArray();
        $this->assertModelData($estudiante->toArray(), $dbestudiante);
    }

    /**
     * @test update
     */
    public function testUpdateestudiante()
    {
        $estudiante = $this->makeestudiante();
        $fakeestudiante = $this->fakeestudianteData();
        $updatedestudiante = $this->estudianteRepo->update($fakeestudiante, $estudiante->id);
        $this->assertModelData($fakeestudiante, $updatedestudiante->toArray());
        $dbestudiante = $this->estudianteRepo->find($estudiante->id);
        $this->assertModelData($fakeestudiante, $dbestudiante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteestudiante()
    {
        $estudiante = $this->makeestudiante();
        $resp = $this->estudianteRepo->delete($estudiante->id);
        $this->assertTrue($resp);
        $this->assertNull(estudiante::find($estudiante->id), 'estudiante should not exist in DB');
    }
}
