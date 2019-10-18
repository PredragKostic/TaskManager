<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
              'task_id' => 'required|numeric',
              'content' => 'required',
           
        ];
    }
}
