<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_categories(): void
    {
        Category::factory()->count(3)->create();

        $this->getJson('/api/categories')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Category::factory()->make()->toArray();

        $this->postJson('/api/categories', $payload)->assertCreated();
        $this->assertDatabaseCount('categories', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/categories', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Category::factory()->create();

        $this->deleteJson('/api/categories/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('categories', ['id' => $item->id]);
    }
}
