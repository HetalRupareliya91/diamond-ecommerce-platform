<?php

namespace Tests\Feature;

use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipmentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_shipments(): void
    {
        Shipment::factory()->count(3)->create();

        $this->getJson('/api/shipments')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Shipment::factory()->make()->toArray();

        $this->postJson('/api/shipments', $payload)->assertCreated();
        $this->assertDatabaseCount('shipments', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/shipments', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Shipment::factory()->create();

        $this->deleteJson('/api/shipments/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('shipments', ['id' => $item->id]);
    }
}
