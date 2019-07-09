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
}
