<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SushiExists implements Rule
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $calledClass;

    /**
     * @var string
     */
    public $column;

    /**
     * Create a new rule instance.
     *
     * @param $calledClass
     * @param $column
     */
    public function __construct($calledClass, $column)
    {
        $this->calledClass = $calledClass;
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->calledClass::where($this->column,$value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The :attribute does not exists.');
    }
}
