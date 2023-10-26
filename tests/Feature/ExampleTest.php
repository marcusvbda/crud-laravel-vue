<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_page_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('teste');
    }
}
