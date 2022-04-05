<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
        $rules = [

            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'company' => 'required|string',
            'post' => 'required|string',
            'description' => ''
        ];
        switch ($this->getMethod())
        {
            case 'GET' :
                return ['data' => 'string'];
            case 'POST':
                return $rules;
            case 'PUT':
                return ['id' => 'required|exists:contacts,id'] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:contacts,id'
                ];
        }
    }
}
