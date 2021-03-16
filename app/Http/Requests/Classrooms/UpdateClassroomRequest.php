<?php

namespace App\Http\Requests\Classrooms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassroomRequest extends FormRequest
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
            'name' => 'required|unique:classrooms,name->ar,' .  $this->classroom->id,
            'name_en' => 'required|unique:classrooms,name->en,' . $this->classroom->id,
            'grade_id' => 'required|not_in:0',
            'notes' => 'nullable'
        ];
    }
}
