<?php

namespace Tests\Feature;

use App\Models\DiamondShape;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondShapeApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_diamond_shapes(): void
    {
        DiamondShape::factory()->count(3)->create();

        $this->getJson('/api/diamond-shapes')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = DiamondShape::factory()->make()->toArray();

        $this->postJson('/api/diamond-shapes', $payload)->assertCreated();
        $this->assertDatabaseCount('diamond_shapes', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/diamond-shapes', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = DiamondShape::factory()->create();

        $this->deleteJson('/api/diamond-shapes/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('diamond_shapes', ['id' => $item->id]);
    }
}
