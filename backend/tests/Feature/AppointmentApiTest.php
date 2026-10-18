<?php

namespace Tests\Feature;

use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_appointments(): void
    {
        Appointment::factory()->count(3)->create();

        $this->getJson('/api/appointments')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Appointment::factory()->make()->toArray();

        $this->postJson('/api/appointments', $payload)->assertCreated();
        $this->assertDatabaseCount('appointments', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/appointments', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Appointment::factory()->create();

        $this->deleteJson('/api/appointments/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('appointments', ['id' => $item->id]);
    }
}
