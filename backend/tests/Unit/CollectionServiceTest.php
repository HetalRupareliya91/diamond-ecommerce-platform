<?php

namespace Tests\Unit;

use App\Models\Collection;
use App\Services\CollectionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollectionServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new CollectionService();
        $model = $service->create(Collection::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new CollectionService();
        $model = Collection::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('collections', ['id' => $model->id]);
    }
}
