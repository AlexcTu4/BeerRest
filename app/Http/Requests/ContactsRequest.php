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
        return false;
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
            'phone' => 'required|string',
            'company' => 'required|string',
            'post' => 'required|string',
        ];
        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
//            case 'PUT':
//                return [
//                        'game_id' => 'required|integer|exists:games,id', //должен существовать. Можно вот так: unique:games,id,' . $this->route('game'),
//                        'title' => [
//                            'required',
//                            Rule::unique('games')->ignore($this->title, 'title') //должен быть уникальным, за исключением себя же
//                        ]
//                    ] + $rules; // и берем все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:contacts,id'
                ];
        }
    }
}
