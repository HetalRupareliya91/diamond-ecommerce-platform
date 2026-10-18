<?php

namespace Tests\Feature;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CouponApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_coupons(): void
    {
        Coupon::factory()->count(3)->create();

        $this->getJson('/api/coupons')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Coupon::factory()->make()->toArray();

        $this->postJson('/api/coupons', $payload)->assertCreated();
        $this->assertDatabaseCount('coupons', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/coupons', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Coupon::factory()->create();

        $this->deleteJson('/api/coupons/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('coupons', ['id' => $item->id]);
    }
}
