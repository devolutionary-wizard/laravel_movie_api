<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return $this->sendResponse(new CategoryResource($category), ' Category has been created successfully');
    }

    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }

    public function view($id) {
        $category = Category::find($id);
        return $this->sendResponse(new CategoryResource($category), ' Category has been retrieved successfully');
    }

    public function edit(CategoryRequest $request, $id){
        $data = $request->validated();
        
        $category = Category::find($id);
        $category->update($data);

        return $this->sendResponse(new CategoryResource($category),' Category has been update successfully');
        
    }

    public function destroy($id){
        Category::destroy($id);
        return $this->sendResponse([],'Category has been deleted successfully');
    }

   
}
