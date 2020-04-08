<?php

namespace Tests\Feature;

use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_home_page()
    {
        $this->get('/')->assertSuccessful();
    }

   /*
    * The rest of the feature test should be written
    * in front-end with JEST as this is an SPA.
    */
}
