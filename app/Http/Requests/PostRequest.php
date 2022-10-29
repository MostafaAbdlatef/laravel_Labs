<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PostRequest extends FormRequest

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
        $rule = [
            'title'=>['required','min:3',"unique:posts,title"],
            'description' => ['required','min:5'],
            'posted-by' => ['exists:users,id']
        ];
        if ($this->method() == 'PUT') {
            $rule = array_merge($rule,['title'=>['required','min:3',"unique:posts,title,".$this->route()->post]]);
        }
        return $rule;
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'title.required' => 'A title is required',
        'description.required' => 'A message is required',
        'posted-by.exists'=>'User doesnit exists'
    ];
}
}
