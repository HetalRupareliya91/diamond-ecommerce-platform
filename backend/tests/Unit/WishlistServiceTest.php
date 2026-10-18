<?php

namespace Tests\Unit;

use App\Models\Wishlist;
use App\Services\WishlistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WishlistServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new WishlistService();
        $model = $service->create(Wishlist::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new WishlistService();
        $model = Wishlist::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('wishlists', ['id' => $model->id]);
    }
}
