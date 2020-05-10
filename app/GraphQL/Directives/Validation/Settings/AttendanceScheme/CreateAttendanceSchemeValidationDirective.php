<?php


namespace App\GraphQL\Directives\Validation\Settings\AttendanceScheme;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class CreateAttendanceSchemeValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'createAttendanceSchemeValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'name' =>  ["required", "max:50"],
            'sick_leaves' => ["nullable", "numeric", "min:0", "not_in:0"],
            'casual_leaves' => ["nullable", "numeric", "min:0", "not_in:0"],
            'planned_leaves' => ["nullable", "numeric", "min:0", "not_in:0"],
            'work_from_home' => ["nullable", "numeric", "min:0", "not_in:0"]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Attendance scheme name is required.',
            'name.max' => 'Attendance scheme name too long.',
            'sick_leaves.numeric' => 'Must be a number',
            'sick_leaves.min' => 'Must be greater then 0',
            'sick_leaves.not_in' => 'Must be greater then 0',
            'casual_leaves.numeric' => 'Must be a number',
            'casual_leaves.min' => 'Must be greater then 0',
            'casual_leaves.not_in' => 'Must be greater then 0',
            'planned_leaves.numeric' => 'Must be a number',
            'planned_leaves.min' => 'Must be greater then 0',
            'planned_leaves.not_in' => 'Must be greater then 0',
            'work_from_home.numeric' => 'Must be a number',
            'work_from_home.min' => 'Must be greater then 0',
            'work_from_home.not_in' => 'Must be greater then 0',
        ];
    }

}
