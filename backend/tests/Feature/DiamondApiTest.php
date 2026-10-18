<?php

namespace Tests\Feature;

use App\Models\Diamond;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_diamonds(): void
    {
        Diamond::factory()->count(3)->create();

        $this->getJson('/api/diamonds')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Diamond::factory()->make()->toArray();

        $this->postJson('/api/diamonds', $payload)->assertCreated();
        $this->assertDatabaseCount('diamonds', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/diamonds', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Diamond::factory()->create();

        $this->deleteJson('/api/diamonds/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('diamonds', ['id' => $item->id]);
    }
}
