<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class VatTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('vats', [
                'id', 'name', 'rate', 'stripe_tax_rate_id'
            ])
        );
    }
}
