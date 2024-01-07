<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashierUpdateRequest extends FormRequest
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
            'email' =>  sprintf('required|max:256|email|unique:cashiers,email,%s,id', $this->route('cashier')),
            'cas_name' => 'required|string',
            'phone' => 'required|string',
            'dateofbirth' => 'required|string',
        ];
    }
}
