<?php

namespace Tests\Unit;

use App\Services\GetCustomerService;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

class GetCustomerServiceTest extends TestCase
{
    private GetCustomerService $getCustomerService;
    protected function setUp(): void
    {
        $this->getCustomerService = new GetCustomerService();
    }

    public function test_get_customer_success(): void
    {
        $data = $this->getCustomerService->get();
        $this->assertIsArray($data);
        $this->assertCount(500, $data);
    }

    public function test_save_customer_success(): void
    {
        DB::shouldReceive('table')
        ->once()
        ->with('customers')
        ->andReturnSelf();
        DB::shouldReceive('insert')
            ->once();
        $this->getCustomerService->save($this->getCustomerService->get());
    }
}
