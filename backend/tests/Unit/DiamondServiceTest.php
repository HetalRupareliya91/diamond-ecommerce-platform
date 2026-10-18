<?php

namespace Tests\Unit;

use App\Models\Diamond;
use App\Services\DiamondService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiamondServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new DiamondService();
        $model = $service->create(Diamond::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new DiamondService();
        $model = Diamond::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('diamonds', ['id' => $model->id]);
    }
}
