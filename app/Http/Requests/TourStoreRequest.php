<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'country_id'=>'required',
            'category_id'=>'required',
            'tour_name'=>'required',
            'tour_days'=>'required',
            'main_price'=>'required',
            'mainImage'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            
        ];
    }
}
