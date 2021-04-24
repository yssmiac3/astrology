<?php

namespace App\Models;

use Database\Factories\ServiceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function newFactory()
    {
        return ServiceFactory::new();
    }

    public function astrologists()
    {
        return $this->belongsToMany(Astrologist::class, 'astrologist_service', 'service_id', 'astrologist_id')
            ->withPivot('price');
    }
}
