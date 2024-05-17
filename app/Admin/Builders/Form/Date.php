<?php

namespace App\Admin\Builders\Form;

class Date extends Text
{
    /**
     * The attributes registered on the controller.
     * 
     * @var array
     */
    public $attributes = [
        'class' => ['layui-input'],
    ];

    public function value(string $value): static
    {
        $this->attributes['value'] = $value;

        return $this;
    }

    public function run(): string
    {
        $selector = '[name="' . $this->attributes['name'] . '"]';

        $date = $this->attributes['value'] ?? '';

        return <<<JAVASCRIPT
            // render
            layui.laydate.render({
                elem: '{$selector}',
                value: '{$date}',
                type: 'date'
            });
JAVASCRIPT;
    }
}