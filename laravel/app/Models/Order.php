<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';


    protected $fillable = [
        'id',
        'astrologist_id',
        'service_id',
        'price',
        'email'
    ];

    public function astrologist()
    {
        return $this->belongsTo(Astrologist::class, 'astrologist_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
