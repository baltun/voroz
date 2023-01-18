<?php

namespace Modules\Backend\Tests\Repositories;

use Modules\Backend\Entities\Json;
use Modules\Backend\Repositories\JsonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JsonRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected JsonRepository $jsonRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jsonRepo = app(JsonRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_json()
    {
        $json = Json::factory()->make()->toArray();

        $createdJson = $this->jsonRepo->create($json);

        $createdJson = $createdJson->toArray();
        $this->assertArrayHasKey('id', $createdJson);
        $this->assertNotNull($createdJson['id'], 'Created Json must have id specified');
        $this->assertNotNull(Json::find($createdJson['id']), 'Json with given id must be in DB');
        $this->assertModelData($json, $createdJson);
    }

    /**
     * @test read
     */
    public function test_read_json()
    {
        $json = Json::factory()->create();

        $dbJson = $this->jsonRepo->find($json->id);

        $dbJson = $dbJson->toArray();
        $this->assertModelData($json->toArray(), $dbJson);
    }

    /**
     * @test update
     */
    public function test_update_json()
    {
        $json = Json::factory()->create();
        $fakeJson = Json::factory()->make()->toArray();

        $updatedJson = $this->jsonRepo->update($fakeJson, $json->id);

        $this->assertModelData($fakeJson, $updatedJson->toArray());
        $dbJson = $this->jsonRepo->find($json->id);
        $this->assertModelData($fakeJson, $dbJson->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_json()
    {
        $json = Json::factory()->create();

        $resp = $this->jsonRepo->delete($json->id);

        $this->assertTrue($resp);
        $this->assertNull(Json::find($json->id), 'Json should not exist in DB');
    }
}
