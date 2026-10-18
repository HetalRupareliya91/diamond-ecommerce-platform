<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_orders(): void
    {
        Order::factory()->count(3)->create();

        $this->getJson('/api/orders')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Order::factory()->make()->toArray();

        $this->postJson('/api/orders', $payload)->assertCreated();
        $this->assertDatabaseCount('orders', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/orders', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Order::factory()->create();

        $this->deleteJson('/api/orders/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('orders', ['id' => $item->id]);
    }
}
