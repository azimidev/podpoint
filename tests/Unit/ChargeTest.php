<?php

namespace Tests\Unit;

use App\Unit;
use App\Charge;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChargeTest extends TestCase
{
    use RefreshDatabase;
    protected $charge;

    public function setUp(): void
    {
        parent::setUp();
        $this->charge = factory(Charge::class)->create();
    }

    /** @test */
    public function it_has_a_unit()
    {
        $this->assertInstanceOf(Unit::class, $this->charge->unit);
    }
}
