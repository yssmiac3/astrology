<?php

namespace App\Models;

use Database\Factories\AstrologistFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astrologist extends Model
{
    use HasFactory;

    protected $table = 'astrologists';


    protected $fillable = [
      'name',
      'biography',
      'email'
    ];

    protected static function newFactory()
    {
        return AstrologistFactory::new();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'astrologist_service', 'astrologist_id', 'service_id')
            ->withPivot('price');
    }
}
