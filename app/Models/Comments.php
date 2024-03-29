<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($comment){
            $comment->user_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

}
