<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['file','movie_id'];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
