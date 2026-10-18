<?php

namespace Tests\Unit;

use App\Models\InventoryItem;
use App\Services\InventoryItemService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryItemServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new InventoryItemService();
        $model = $service->create(InventoryItem::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new InventoryItemService();
        $model = InventoryItem::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('inventory_items', ['id' => $model->id]);
    }
}
