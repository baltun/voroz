<?php

namespace Modules\Backend\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use Modules\Backend\Entities\Json;

class JsonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_json()
    {
        $json = Json::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jsons', $json
        );

        $this->assertApiResponse($json);
    }

    /**
     * @test
     */
    public function test_read_json()
    {
        $json = Json::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/jsons/'.$json->id
        );

        $this->assertApiResponse($json->toArray());
    }

    /**
     * @test
     */
    public function test_update_json()
    {
        $json = Json::factory()->create();
        $editedJson = Json::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jsons/'.$json->id,
            $editedJson
        );

        $this->assertApiResponse($editedJson);
    }

    /**
     * @test
     */
    public function test_delete_json()
    {
        $json = Json::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jsons/'.$json->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jsons/'.$json->id
        );

        $this->response->assertStatus(404);
    }
}
