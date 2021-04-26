<?php

namespace App\Jobs;

use App\Services\GoogleSheet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class AddOrderToGoogleSheets
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Order $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = (new GoogleSheet())->saveDataToSheet($this->order->toArray());
        \Log::info($response);
    }
}
