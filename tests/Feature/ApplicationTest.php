<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * Test if the application is running ok.
     *
     * @return void
     */
    public function application_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
