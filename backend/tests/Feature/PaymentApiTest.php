<?php

namespace Tests\Feature;

use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_payments(): void
    {
        Payment::factory()->count(3)->create();

        $this->getJson('/api/payments')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Payment::factory()->make()->toArray();

        $this->postJson('/api/payments', $payload)->assertCreated();
        $this->assertDatabaseCount('payments', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/payments', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Payment::factory()->create();

        $this->deleteJson('/api/payments/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('payments', ['id' => $item->id]);
    }
}
