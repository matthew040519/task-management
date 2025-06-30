<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic test to check the home page.
     */

    /**
     * Test that the /tasks route returns a successful response.
     */
    public function test_tasks_route_returns_success(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    /**
     * Test that a non-existent route returns a 404.
     */
    public function test_non_existent_route_returns_404(): void
    {
        $response = $this->get('/non-existent-route');

        $response->assertStatus(404);
    }
}
