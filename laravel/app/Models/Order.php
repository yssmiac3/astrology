<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now();
        });
    }

    protected $casts = [
      'created_at' => 'date:Y-m-d h:i:s'
    ];

    protected $fillable = [
        'id',
        'astrologist_id',
        'service_id',
        'price',
        'email',
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
