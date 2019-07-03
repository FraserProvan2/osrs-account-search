<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicFrontendTest extends TestCase
{
    /** @test */
    public function page_loads_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function search_button_is_present()
    {
        //
    }

    /** @test */
    public function account_name_input_is_present()
    {
        //
    }
}
