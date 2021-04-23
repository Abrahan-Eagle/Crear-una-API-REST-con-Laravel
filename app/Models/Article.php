<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($article){
            $article->user_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comments::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }





}
