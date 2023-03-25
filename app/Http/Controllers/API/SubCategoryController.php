<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends BaseController
{
    public function index() {
        $subCategories = SubCategory::all();
        return $this->sendResponse(SubCategoryResource::collection($subCategories),'SubCategories retrieved successfully.');
    }
    public function store(SubCategoryRequest $request){
        $data = $request->validated();
        $subCategory = SubCategory::create($data);
        return $this->sendResponse(new SubCategoryResource($subCategory),' SubCategory has been created successfully');
    }

    public function update(SubCategoryRequest $request, $id){
        $data = $request->validated();
        $subCategory = SubCategory::find($id);
        $subCategory->update($data);
        return $this->sendResponse(new SubCategoryResource($$subCategory),' SubCategory has been updated successfully');
    }

    public function destry($id){
        SubCategory::destroy($id);
        return $this->sendResponse([],'SubCategory has been deleted successfully');
        
    }
}
