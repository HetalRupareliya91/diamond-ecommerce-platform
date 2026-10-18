<?php

namespace Tests\Unit;

use App\Models\Appointment;
use App\Services\AppointmentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new AppointmentService();
        $model = $service->create(Appointment::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new AppointmentService();
        $model = Appointment::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('appointments', ['id' => $model->id]);
    }
}
