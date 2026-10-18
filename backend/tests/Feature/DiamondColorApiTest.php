<?php

namespace Tests\Feature;

use App\Models\DiamondColor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondColorApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_diamond_colors(): void
    {
        DiamondColor::factory()->count(3)->create();

        $this->getJson('/api/diamond-colors')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = DiamondColor::factory()->make()->toArray();

        $this->postJson('/api/diamond-colors', $payload)->assertCreated();
        $this->assertDatabaseCount('diamond_colors', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/diamond-colors', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = DiamondColor::factory()->create();

        $this->deleteJson('/api/diamond-colors/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('diamond_colors', ['id' => $item->id]);
    }
}
