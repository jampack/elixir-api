<?php


namespace App\GraphQL\Directives\Validation\Card;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class CreateCardValidationDirective extends ValidationDirective
{

    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'createCardValidation';
    }

    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'title' =>  ["required", "max:150"],
            'description' => ["max:10000"],
            'type' => ["required", "in:1,2,3"],
            'board_id' => ["required", "exists:boards,id"],
            'board_column_id' => ["required", "exists:board_columns,id"],
            'task_type_id' => ["required", "exists:card_task_types,id"],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Card title is required.',
            'title.max' => 'Card title is too long.',
            'description.max' => 'Description can not be longer then 10000 characters.',
            'board_id.required' => 'Card must have a board.',
            'board_id.exists' => 'Invalid board.',
            'board_column_id.required' => 'Card must be in a column.',
            'board_column_id.exists' => 'Invalid column.'
        ];
    }

}
