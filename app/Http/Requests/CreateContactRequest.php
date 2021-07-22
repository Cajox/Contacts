<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'contacts.*.first_name' => 'required|string',
            'contacts.*.last_name' => 'required|string',
            'contacts.*.phones.*.number' => 'string',
            'contacts.*.phones.*.type' => 'string',
        ];
    }

}
