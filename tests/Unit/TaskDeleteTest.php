<?php

namespace Tests\Unit;

use Tests\TestCase;

class TaskDeleteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // create a task for unit test
    public function test_can_be_created()
    {
        $response = $this->post('/task', [
            'timeStart' => '16:00',
            'timeEnd' => '17:00',
            'description' => 'test',
            'field_id' => '1',
            'status' => 'Done'
        ]);

        $response->assertStatus(200);
    }

    public function test_can_be_deleted()
    {
        $response = $this->delete('/task/14');

        $response->assertStatus(200);
    }
}
