<?php

namespace Tests\Unit;

use Tests\TestCase;

class FieldTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_field_can_be_created()
    {
        $response = $this->post('/field', [
            'address' => 'Fieldtest',
            'company_id' => '1',
            'area' => '1',
            'type' => '1',
        ]);


        $response->assertStatus(200);
    }
}
