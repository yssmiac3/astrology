<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Astrologist;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        // get price from pivot table
        $price = Astrologist::findOrFail($request->astrologist_id)
            ->services()
            ->where('service_id', $request->service_id)
            ->select('price')
            ->first()
            ->pivot->price;

        $order = Order::create([
            'astrologist_id' => $request->astrologist_id,
            'service_id' => $request->service_id,
            'price' => $price,
            'email' => $request->email
        ]);

        if ($order) {
            event(new OrderCreated($order));
            return response()->json(route('api.astrologists.all'), 200);
        }
        // else ...
    }

    // expecting method to define a Payment Service (generate url or smth)
}
