<?php

namespace App\Listeners;

use App\Jobs\AddOrderToGoogleSheets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderEventListener
{
    /**
     * @param $event
     */
    public function onOrderCreated($event)
    {
        AddOrderToGoogleSheets::dispatch($event->order);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\OrderCreated::class,
            [\App\Listeners\OrderEventListener::class ,'onOrderCreated']
        );
    }
}
