<?php

namespace Tests\Feature;

use App\Models\Earring;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EarringApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_earrings(): void
    {
        Earring::factory()->count(3)->create();

        $this->getJson('/api/earrings')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Earring::factory()->make()->toArray();

        $this->postJson('/api/earrings', $payload)->assertCreated();
        $this->assertDatabaseCount('earrings', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/earrings', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Earring::factory()->create();

        $this->deleteJson('/api/earrings/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('earrings', ['id' => $item->id]);
    }
}
