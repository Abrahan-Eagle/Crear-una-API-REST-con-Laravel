<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->as('category_user')->withTimestamps();
    }

}
