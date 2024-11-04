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
    
    //カメラ削除アクション時に子テーブルの画像ファイルを削除
    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($camera) {
            $photos = $camera->photos;
            
            foreach($photos as $photo) {
                \Storage::delete('public/images/'. $photo->filename);
            }
            
        });
    }
}
