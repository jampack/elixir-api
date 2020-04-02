<?php


namespace App\GraphQL\Directives\Validation\Project;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class CreateProjectValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'createProjectValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'name' =>  ["required", "unique:projects,name", "max:50"],
            'description' => ["max:500"],
            'status_id' => ["required", "exists:project_statuses,id"]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Project name is required.',
            'name.unique' => 'There is already a project with this name.',
            'name.max' => 'Project name too long.',
            'description.max' => 'Description can not be longer then 500 characters.',
            'status_id.required' => 'Project must have a status.',
            'status_id.exists' => 'Invalid status.'
        ];
    }

}
