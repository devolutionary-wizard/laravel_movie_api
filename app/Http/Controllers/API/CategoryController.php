<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }
}
