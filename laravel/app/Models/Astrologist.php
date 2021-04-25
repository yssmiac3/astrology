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
        'id',
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

    public function orders()
    {
        return $this->hasMany(Order::class, 'astrologist_id', 'id');
    }

    public function getPhotoUrlAttribute()
    {
        return asset($this->photo);
    }

    public function setPhotoUrlAttribute($id)
    {
        $this->photo = 'storage/images/astrologist_' . $id . '.jpeg';
    }
}
