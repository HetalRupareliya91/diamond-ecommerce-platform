<?php

namespace Tests\Unit;

use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new ReviewService();
        $model = $service->create(Review::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new ReviewService();
        $model = Review::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('reviews', ['id' => $model->id]);
    }
}
