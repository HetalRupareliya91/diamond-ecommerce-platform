<?php

namespace Tests\Unit;

use App\Models\WeddingBand;
use App\Services\WeddingBandService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeddingBandServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new WeddingBandService();
        $model = $service->create(WeddingBand::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new WeddingBandService();
        $model = WeddingBand::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('wedding_bands', ['id' => $model->id]);
    }
}
