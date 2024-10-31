<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    
    protected $fillable = ['latitude', 'longitude', 'memo', 'filename'];
    
    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }
    
    public function getLatitudeAttribute($latitude)
    {
        return $this->attributes['latitude'] = sprintf('%s', number_format($latitude, 6));
    }
    public function getLongitudeAttribute($longitude)
    {
        return $this->attributes['longitude'] = sprintf('%s', number_format($longitude, 6));
    }
}
