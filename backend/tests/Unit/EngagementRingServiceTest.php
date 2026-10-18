<?php

namespace Tests\Unit;

use App\Models\EngagementRing;
use App\Services\EngagementRingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EngagementRingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new EngagementRingService();
        $model = $service->create(EngagementRing::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new EngagementRingService();
        $model = EngagementRing::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('engagement_rings', ['id' => $model->id]);
    }
}
