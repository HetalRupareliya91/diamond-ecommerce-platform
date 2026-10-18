<?php

namespace Tests\Feature;

use App\Models\Necklace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NecklaceApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_necklaces(): void
    {
        Necklace::factory()->count(3)->create();

        $this->getJson('/api/necklaces')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Necklace::factory()->make()->toArray();

        $this->postJson('/api/necklaces', $payload)->assertCreated();
        $this->assertDatabaseCount('necklaces', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/necklaces', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Necklace::factory()->create();

        $this->deleteJson('/api/necklaces/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('necklaces', ['id' => $item->id]);
    }
}
