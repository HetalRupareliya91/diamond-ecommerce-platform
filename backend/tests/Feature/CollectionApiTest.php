<?php

namespace Tests\Feature;

use App\Models\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollectionApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_collections(): void
    {
        Collection::factory()->count(3)->create();

        $this->getJson('/api/collections')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Collection::factory()->make()->toArray();

        $this->postJson('/api/collections', $payload)->assertCreated();
        $this->assertDatabaseCount('collections', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/collections', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Collection::factory()->create();

        $this->deleteJson('/api/collections/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('collections', ['id' => $item->id]);
    }
}
