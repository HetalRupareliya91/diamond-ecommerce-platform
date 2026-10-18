<?php

namespace Tests\Feature;

use App\Models\Certificate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificateApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_certificates(): void
    {
        Certificate::factory()->count(3)->create();

        $this->getJson('/api/certificates')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_record(): void
    {
        $payload = Certificate::factory()->make()->toArray();

        $this->postJson('/api/certificates', $payload)->assertCreated();
        $this->assertDatabaseCount('certificates', 1);
    }

    public function test_name_is_required(): void
    {
        $this->postJson('/api/certificates', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    public function test_it_deletes_a_record(): void
    {
        $item = Certificate::factory()->create();

        $this->deleteJson('/api/certificates/'.$item->id)->assertNoContent();
        $this->assertDatabaseMissing('certificates', ['id' => $item->id]);
    }
}
