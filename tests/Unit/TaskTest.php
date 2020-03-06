<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Task;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_can_create_task(){

        $response = $this->json('POST', '/api/add-task', ['task' => 'Do Shopping 2']);

        $response
            ->assertStatus(200);

        //$response->dump();
    }

    public function test_can_delete_task(){

        $taskId   = 53;

        $response = $this->json('DELETE', 'api/delete-task/'.$taskId);

        $response
            ->assertStatus(200);

        //$response->dump();
    }    
}
