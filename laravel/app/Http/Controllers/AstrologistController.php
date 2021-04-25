<?php

namespace App\Http\Controllers;

use App\Models\Astrologist;
use Illuminate\Http\Request;

class AstrologistController extends Controller
{
    public function all()
    {
        $data = Astrologist::all()->map( function ($item) {
            return [
                'photo' => $item->photo_url,
                'name' => $item->name,
                'services' => $item->services->pluck('name'),
                'detailsUrl' => route('api.astrologists.show', $item->id)
            ];
        });

        return response()->json($data);
    }

    public function show(Astrologist $astrologist)
    {
        $services = $astrologist->services->map( function ($service) {
            return [
                'name' => $service->name,
                'price' => $service->pivot->price,
                // route for buying
                'buyUrl' => 'kupit uslugu'
            ];
        });
        $data = [
            'photo' => $astrologist->photo_url,
            'name' => $astrologist->name,
            'biography' => $astrologist->biography,
            'services' => $services,
        ];

        return response()->json($data);
    }
}
