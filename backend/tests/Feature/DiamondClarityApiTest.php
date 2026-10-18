<?php

namespace Tests\Feature;

use App\Models\DiamondClarity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondClarityApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_diamond_clarities(): void
    {
        DiamondClarity::factory()->count(3)->create();

        $this->getJson('/api/diamond-clarities')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = DiamondClarity::factory()->make()->toArray();

        $this->postJson('/api/diamond-clarities', $payload)->assertCreated();
        $this->assertDatabaseCount('diamond_clarities', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/diamond-clarities', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = DiamondClarity::factory()->create();

        $this->deleteJson('/api/diamond-clarities/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('diamond_clarities', ['id' => $item->id]);
    }
}
