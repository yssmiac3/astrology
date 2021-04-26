<?php

namespace Tests\Feature;

use App\Models\Astrologist;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeds()
    {
        $this->seed();

        $this->assertDatabaseCount('astrologists', 5);
    }
}
