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
}
