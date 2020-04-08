<?php

namespace Tests\Unit;

use App\Unit;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitTest extends TestCase
{
    use RefreshDatabase;
    protected $unit;

    public function setUp(): void
    {
        parent::setUp();
        $this->unit = factory(Unit::class)->create();
    }

    /** @test */
    public function it_has_charges()
    {
        $this->assertInstanceOf(Collection::class, $this->unit->charges);
    }
}
