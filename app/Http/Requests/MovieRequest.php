<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'thumnail'=>'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date'=> 'nullable',
            'sub_category_id'=>'required',
            'is_favourite'=> 'nullable'
        ];
    }
}
