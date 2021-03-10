<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'date' => 'bail|required|date|after:yesterday',
            'user_id' => 'bail|required|number|min:1',
            'department_id' => 'bail|required|number|min:1',
            'section_id' => 'bail|required|number|min:1',
            'category_id' => 'bail|required|number|min:1',
            'product-id' => 'bail|required|number|min:1',
            'category1-id' => 'bail|required|number|min:1',
            'product1-quantity' => 'bail|required|number|min:1',
            'product1-comment' => 'bail|required|number|min:1',
            'product1-price' => 'bail|required|number|min:1',
            'total-product1-quantity-price' => 'bail|required|number|min:1',
        ];
    }
}
