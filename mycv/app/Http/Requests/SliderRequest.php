<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name' => 'required|min:3',
            'description' => 'required',
            'link' => 'bail|required|min:5|url',
            'status' => 'bail|required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Vui lòng nhập tên người dùng của bạn',
            // 'name.min' => 'Name :input tối thiểu :min ký tự tiếng Anh',
        ];
    }

    public function attributes()
    {
        return [
            // 'description' => 'Mô tả: ',
        ];
    }
}