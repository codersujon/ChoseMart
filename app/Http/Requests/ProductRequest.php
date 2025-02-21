<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:200',
            'product_code'=>'required',
            'short_des' => 'required|max:500',
            'price' => 'required',
            'old_price' => 'required',
            'discount_price' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'quantity'=>'required',
            'size'=> 'required',
            'color'=>'required'
        ];
    }
}
