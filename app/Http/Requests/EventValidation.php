<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required',
            'host_name' => 'required',
            'host_email' => 'required|email',
            'all_day' => 'boolean|nullable',
        ];
    }
}
