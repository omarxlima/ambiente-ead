<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255',
                // "unique:courses,name,{$this->course},id",
                Rule::unique('courses')->ignore($this->course),
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024'
            ],

            'description' => [
                'nullable',
                'min:3',
                'max:9999'
            ],
            'available' => [
                'nullable',
                'boolean'
            ],

        ];
        //outro tipo de validação
        // if($this->method() == 'PUT') {
        //     $rules['image'] = [
        //         'nullable',
        //         'image',
        //         'max:2048'
        //     ];
        // }

        return $rules;
    }
}
