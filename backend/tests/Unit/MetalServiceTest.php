<?php

namespace Tests\Unit;

use App\Models\Metal;
use App\Services\MetalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MetalServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new MetalService();
        $model = $service->create(Metal::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new MetalService();
        $model = Metal::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('metals', ['id' => $model->id]);
    }
}
