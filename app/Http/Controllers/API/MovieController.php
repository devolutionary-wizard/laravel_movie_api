<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends BaseController
{
    public function index(){
        $movies = Movie::all();
        return $this->sendResponse(MovieResource::collection($movies),'Movies retrieved successfully.');
    }
}
