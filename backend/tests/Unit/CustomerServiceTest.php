<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_and_updates(): void
    {
        $service = new CustomerService();
        $model = $service->create(Customer::factory()->make()->toArray());

        $updated = $service->update($model, ['name' => 'Updated name']);

        $this->assertSame('Updated name', $updated->name);
    }

    public function test_it_deletes(): void
    {
        $service = new CustomerService();
        $model = Customer::factory()->create();

        $service->delete($model);

        $this->assertDatabaseMissing('customers', ['id' => $model->id]);
    }
}
