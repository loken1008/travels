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
            'place_id'=>'required',
            'category_id'=>'required',
            // 'subcategory_id'=>'required',
            'tour_name'=>'required',
            // 'altitude'=>'required',
            'tour_days'=>'required',
            'main_price'=>'required',
            // 'mainImage'=>'required',
            // 'images'=>'required',
            'description'=>'required',
            // 'cost_include'=>'required',
            // 'cost_exclude'=>'required',
            // '*.start_date' => 'required',
            // '*.end_date' => 'required',
            // '*.seats_available' => 'required',
            // '*.price' => 'required',
            // '*.equipment_name' => 'required',
            // '*.equipment_description' => 'required',
            // '*.day_title'=>'required',
            // '*.long_description'=>'required',
        ];
    }
}
