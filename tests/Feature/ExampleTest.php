<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the company profile page returns 200.
     */
    public function test_the_profile_page_returns_a_successful_response(): void
    {
        $response = $this->get('/profil');

        $response->assertStatus(200);
    }

    /**
     * Test the gallery page returns 200.
     */
    public function test_the_gallery_page_returns_a_successful_response(): void
    {
        $response = $this->get('/galeri');

        $response->assertStatus(200);
    }

    /**
     * Test the video gallery page returns 200.
     */
    public function test_the_video_gallery_page_returns_a_successful_response(): void
    {
        $response = $this->get('/galeri-video');

        $response->assertStatus(200);
    }

    /**
     * Test the testimonials page returns 200.
     */
    public function test_the_testimonials_page_returns_a_successful_response(): void
    {
        $response = $this->get('/testimoni');

        $response->assertStatus(200);
    }
}
