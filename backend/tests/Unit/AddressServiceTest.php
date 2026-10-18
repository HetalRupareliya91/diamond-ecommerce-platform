<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new AddressService();
        $model = $service->create(Address::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new AddressService();
        $model = Address::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('addresses', ['id' => $model->id]);
    }
}
