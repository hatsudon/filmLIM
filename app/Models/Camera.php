<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'memo'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
