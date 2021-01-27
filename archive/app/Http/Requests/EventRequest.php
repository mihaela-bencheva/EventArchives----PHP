<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_name' => 'required|min:5|max:255',
            'event_year' => 'required|min:4|max:4',
            'types' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'event_name.required'=> "Please enter an event name.",
            'event_name.max'=> "The event name must be with less than 255 characters.",
            'event_name.min'=> "The event name must be with more than 5 characters.",
            'event_year.required'=> "Please enter an event year.",
            'event_year.max'=> "The event year must be with 4 characters.",
            'event_year.min'=> "The event year must be with 4 characters.",
            "types.required" => "Please enter an event type."
        ];
    }
}
