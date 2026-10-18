<?php

namespace Tests\Feature;

use App\Models\InventoryItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_inventory_items(): void
    {
        InventoryItem::factory()->count(3)->create();

        $this->getJson('/api/inventory-items')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = InventoryItem::factory()->make()->toArray();

        $this->postJson('/api/inventory-items', $payload)->assertCreated();
        $this->assertDatabaseCount('inventory_items', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/inventory-items', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = InventoryItem::factory()->create();

        $this->deleteJson('/api/inventory-items/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('inventory_items', ['id' => $item->id]);
    }
}
