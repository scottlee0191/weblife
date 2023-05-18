<?php

namespace App\Console\Commands;

use App\Services\GetCustomerService;
use Illuminate\Console\Command;

class GetCustomer extends Command
{

    public function __construct(private readonly GetCustomerService $getCustomerService)
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->line('Running get customer!', 'info');
        $data = $this->getCustomerService->get();
        try {
            $this->line('Running save customer!', 'info');
            $this->getCustomerService->save($data);
            $this->line('Running save customer success!', 'info');

        } catch (\Exception $exception) {
            $this->error('Something went wrong!');
            $this->error($exception->getMessage());
        }
    }
}
