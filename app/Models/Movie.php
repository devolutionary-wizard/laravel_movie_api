<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','thumnail','release_date','is_favourite'];

    protected $cast =[
        'is_favourite'=>'boolean'
    ];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
