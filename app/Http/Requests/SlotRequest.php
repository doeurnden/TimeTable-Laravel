<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class SlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            "course_program_id" => "required|integer",
            "semester_id" => "required|integer",
            "lecturer_id" => "integer|nullable",
            "timetable_id" => "required|integer",
            "room_id" => "integer|nullable",
            "academic_year_id"=>"required|integer",
            // "timetable_id"              => 'required',
            // "course_program_id"         => 'required',
            // "slot_id"                   => 'required',
            // "lecturer_id"               => 'required',
            // "room_id"                   => 'required',
            // "group_merge_id"            => 'required',
            // "course_name"               => 'required',
            "type"                      => 'required',
            "durations"                 => 'required',
            "start"                     => 'required',
            "end"                       => 'required',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

}
