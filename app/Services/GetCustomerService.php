<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetCustomerService
{

    public function get(): array
    {
//        $response = Http::get('url shopify customer');
        return range(1,500);
    }

    public function save(array $data): void
    {
        $customerData = [];
        foreach ($data as $item){
            $customerData[] = ['customer_id' => $item ];
        }

        $chunks = collect($customerData)->chunk(100);

        foreach ($chunks as $chunk)
        {
            DB::table('customers')->insert($chunk->toArray());
        }
    }
}
