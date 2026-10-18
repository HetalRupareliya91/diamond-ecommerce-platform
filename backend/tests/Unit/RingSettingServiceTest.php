<?php

namespace Tests\Unit;

use App\Models\RingSetting;
use App\Services\RingSettingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RingSettingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new RingSettingService();
        $model = $service->create(RingSetting::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new RingSettingService();
        $model = RingSetting::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('ring_settings', ['id' => $model->id]);
    }
}
