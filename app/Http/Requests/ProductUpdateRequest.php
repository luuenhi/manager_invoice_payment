<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'product_name' => sprintf('required|max:256|unique:products,product_name,%s,id', $this->route('product')),
            'unit' => 'required|string',
            'price' => 'required|string',
            'weight_product' => 'required|string',
        ];
    }
}
