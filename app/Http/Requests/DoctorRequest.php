<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:250'],
            'phone' =>['required', 'min:10', 'string','unique:users'],
            'speciaity' => ['required','string','min:3','max:250'],
            'room' => ['required','string','max:10'],
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
