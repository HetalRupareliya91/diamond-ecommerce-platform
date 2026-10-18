<?php

namespace Tests\Unit;

use App\Models\Shipment;
use App\Services\ShipmentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipmentServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new ShipmentService();
        $model = $service->create(Shipment::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new ShipmentService();
        $model = Shipment::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('shipments', ['id' => $model->id]);
    }
}
