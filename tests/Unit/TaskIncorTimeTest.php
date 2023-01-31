<?php

namespace Tests\Unit;

use Tests\TestCase;

class TaskIncorTimeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_time_cant_be_written_incorrect()
    {
        $response = $this->post('/task', [
            'timeStart' => '126:00',
            'timeEnd' => '172:00',
            'type' => '1',
            'description' => 'test',
            'field_id' => '1',
        ]);

        $response->assertStatus(302);
    }
}
