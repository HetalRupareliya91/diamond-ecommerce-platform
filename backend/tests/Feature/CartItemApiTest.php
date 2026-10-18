<?php

namespace Tests\Feature;

use App\Models\CartItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_cart_items(): void
    {
        CartItem::factory()->count(3)->create();

        $this->getJson('/api/cart-items')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = CartItem::factory()->make()->toArray();

        $this->postJson('/api/cart-items', $payload)->assertCreated();
        $this->assertDatabaseCount('cart_items', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/cart-items', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = CartItem::factory()->create();

        $this->deleteJson('/api/cart-items/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('cart_items', ['id' => $item->id]);
    }
}
