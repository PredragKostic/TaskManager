<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {        
        request()->merge([
            'user_id' => auth()->user()->id,
            'is_visible' => request('is_visible') ? true : false,
            'is_done' => request('is_done') ? true : false,
        ]);
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
            'title' => 'required|max:255',
            'project_id' => 'required|numeric',

        ];
    }
}
