<?php


namespace App\GraphQL\Directives\Validation\Authentication;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class LoginValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'loginValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'username' =>  ["required", "exists:users,email", "max:50"],
            'password' => ["required", "min:5", "max:50"],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'username.required' => 'E-Mail is required.',
            'username.exists' => 'E-Mail in invalid.',
            'username.max' => 'E-Mail too long.',
            'password.required' => 'Password is required.',
            'password.min' => "Password is incorrect.",
            'password.max' => "Password is too long."
        ];
    }

}
