<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function test_create_task(){
    	echo 123;
    	die();
    	
        $taskInsertArray              = array();
        $taskInsertArray['title']     = $this->faker->name;
        $taskInsertArray['completed'] = $this->faker->boolean;    	
    
        $this->post(route('api.add-task'), $taskInsertArray)
            ->assertStatus(200)
            ->assertJson($taskInsertArray);
    }
}
