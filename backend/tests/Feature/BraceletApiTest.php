<?php

namespace Tests\Feature;

use App\Models\Bracelet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BraceletApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_bracelets(): void
    {
        Bracelet::factory()->count(3)->create();

        $this->getJson('/api/bracelets')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Bracelet::factory()->make()->toArray();

        $this->postJson('/api/bracelets', $payload)->assertCreated();
        $this->assertDatabaseCount('bracelets', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/bracelets', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Bracelet::factory()->create();

        $this->deleteJson('/api/bracelets/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('bracelets', ['id' => $item->id]);
    }
}
