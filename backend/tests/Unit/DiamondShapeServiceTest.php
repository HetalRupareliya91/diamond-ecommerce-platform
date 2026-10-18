<?php

namespace Tests\Unit;

use App\Models\DiamondShape;
use App\Services\DiamondShapeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondShapeServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new DiamondShapeService();
        $model = $service->create(DiamondShape::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new DiamondShapeService();
        $model = DiamondShape::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('diamond_shapes', ['id' => $model->id]);
    }
}
