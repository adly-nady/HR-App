<?php

namespace App\Http\Requests;

use App\Models\product\brand;
use App\Models\product\product;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en' => ['required', 'max:255', 'min:3', function ($arreibute, $value, $fail) {
                if ($value == "js") {
                    $fail("this word can't writed ....!");
                }
            }],
            'name_ar' => ['required', 'max:255', 'min:3'],
            'price' => ['required'],
            'code' => ['required'],
            'image' => ['required'],
            'desc_en' => ['required'],
            'desc_ar' => ['required'],
            'quantity' => ['required', 'max:6'],
            'status' => ['required'],
            'SubCategores' => ['required'],
            'Brands' => ['required'],
            // 'code' => ['required ',"unique:products,code,$id,id"]
        ];
    }
}
