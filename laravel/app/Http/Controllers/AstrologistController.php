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
                'id' => $item->id,
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
        $services = $astrologist->services->map( function ($service) use($astrologist) {
            return [
                'id' => $service->id,
                'name' => $service->name,
                'price' => $service->pivot->price,

                // payment url and data
                'paymentInfo' => [
                    'url' => 'Payment url based on astrologist, service etc.',
                    'data' => [
                        'email' => 'User email',
                        'astrologist_id' => $astrologist->id,
                        'service_id' => $service->id,
                        'etc' => 'The data we expect on order creating'
                    ]
                ]
            ];
        });

        $data = [
            'id' => $astrologist->id,
            'photo' => $astrologist->photo_url,
            'name' => $astrologist->name,
            'biography' => $astrologist->biography,
            'services' => $services,
        ];

        return response()->json($data);
    }
}
