<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicFrontendTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function page_loads_ok()
    {
        $response = $this->get('/');
   
        $response->assertStatus(200);
    }

    /** @test */
    public function page_with_account_onload_loads_ok()
    {
        $response = $this->get('/krun64');

        $response->assertStatus(200);
    }
}
