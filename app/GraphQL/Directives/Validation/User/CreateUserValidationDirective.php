<?php


namespace App\GraphQL\Directives\Validation\User;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class CreateUserValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'createUserValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'name' =>  ["required", "max:30"],
            'email' => ["required", "unique:users,email", "max:30"],
            'role' => ["required"]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => "Name can't be longer then 30 characters.",
            'email.required' => 'E-Mail is required..',
            'email.unique' => 'E-mail is already registered.',
            'email.max' => "E-mail can't be longer then 30 characters.",
            'role.required' => "Role is required.",
        ];
    }

}
