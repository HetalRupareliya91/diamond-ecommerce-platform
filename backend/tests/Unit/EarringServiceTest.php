<?php

namespace Tests\Unit;

use App\Models\Earring;
use App\Services\EarringService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EarringServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new EarringService();
        $model = $service->create(Earring::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new EarringService();
        $model = Earring::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('earrings', ['id' => $model->id]);
    }
}
