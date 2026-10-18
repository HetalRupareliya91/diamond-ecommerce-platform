<?php

namespace Tests\Feature;

use App\Models\DiamondCut;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondCutApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_diamond_cuts(): void
    {
        DiamondCut::factory()->count(3)->create();

        $this->getJson('/api/diamond-cuts')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = DiamondCut::factory()->make()->toArray();

        $this->postJson('/api/diamond-cuts', $payload)->assertCreated();
        $this->assertDatabaseCount('diamond_cuts', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/diamond-cuts', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = DiamondCut::factory()->create();

        $this->deleteJson('/api/diamond-cuts/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('diamond_cuts', ['id' => $item->id]);
    }
}
