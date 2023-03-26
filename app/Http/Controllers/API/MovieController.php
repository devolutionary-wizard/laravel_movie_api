<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class MovieController extends BaseController
{

    use ImageTrait;

    public function index(){
        $movies = Movie::all();
        return $this->sendResponse(MovieResource::collection($movies),'Movies retrieved successfully.');
    }

    public function store(Request $request){
        // $data = $request->validated();
        
        if($request->hasFile('thumnail')){
            $file =$request['thumnail'];
           return $this->verifyAndUpload($file,'public/images/movies');

        }
        
    }

    
}
