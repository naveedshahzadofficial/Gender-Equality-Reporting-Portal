<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'project_type_id'=>'required',
            'project_title'=>['required','string', Rule::unique('projects', 'project_title')->where('project_type_id', $this->project_type_id)],
            'project_start_date'=>'required|date',
            'project_end_date'=>'required|date',
        ];
    }

    public function messages()
    {
        return [
            'project_title.unique' => 'Project title already exist in this project type.',
        ];
    }
}
