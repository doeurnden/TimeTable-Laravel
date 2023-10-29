<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotRequestUpdate extends FormRequest
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
            "course_program_id" => "integer",
            "semester_id" => "integer",
            "lecturer_id" => "integer",
            "timetable_id" => "integer",
            "room_id" => "integer",

            "academic_year_id" => "integer",
            // "timetable_id"              => 'required',
            // "course_program_id"         => 'required',
            // "slot_id"                   => 'required',
            // "lecturer_id"               => 'required',
            // "room_id"                   => 'required',
            // "group_merge_id"            => 'required',
            // "course_name"               => 'required',
            "type"                      => "string",
            "durations"                 => "nullable",
            "start"                     => "date",
            "end"                       => "date",
            "group_id" => "integers",
        ];
    }
}
