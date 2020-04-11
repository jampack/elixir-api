<?php


namespace App\GraphQL\Directives\Validation\Project;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class CreateProjectModuleValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'createProjectModuleValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'project_id' =>  ["required", "exists:projects,id"],
            'name' => ["required", "max:50"],
            'description' => ["max:500"],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'project_id.required' => 'Project is required.',
            'project_id.exists' => 'Project does not exist.',
            'name.required' => 'Module name is required.',
            'name.max' => 'Module name too long.',
            'description.max' => 'Description can not be longer then 500 characters.',
        ];
    }

}
