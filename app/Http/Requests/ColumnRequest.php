<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColumnRequest extends FormRequest {

    protected $table = 'columns';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the TagRequest.
     *
     * @return array
     */
    public function rules() {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'title' => 'required|unique:'.$this->table.',title|max:100',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|unique:'.$this->table.',title,'.$this->id.'|max:100',
                ];
            }
            default:
                break;
        }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'The title field is required.'
        ];
    }
}
