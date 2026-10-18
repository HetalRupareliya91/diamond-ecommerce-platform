<?php

namespace Tests\Unit;

use App\Models\Necklace;
use App\Services\NecklaceService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NecklaceServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new NecklaceService();
        $model = $service->create(Necklace::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new NecklaceService();
        $model = Necklace::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('necklaces', ['id' => $model->id]);
    }
}
