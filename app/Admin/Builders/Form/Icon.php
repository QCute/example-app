<?php

namespace App\Admin\Builders\Form;

class Icon extends Field
{
    /**
     * The attributes registered on the controller.
     * 
     * @var array
     */
    public $attributes = [
        'style' => [
            'height' => '38px',
            'display' => 'flex',
            'align-items' => 'center',
        ],
    ];

    /**
     * The default icon set registered on the controller.
     * 
     * @var array
     */
    public $defaultIconSet = 'layui-icon';

    public function value(string $value): static
    {
        $data = array_reverse(explode(' ', $value));
        
        $iconSet = $data[1] ?? $this->defaultIconSet;

        $icon = $data[0];

        $this->class([$iconSet, $icon]);

        return $this;
    }

    public function render(): string
    {
        $label = $this->formatLabel();

        $attributes = $this->formatAttributes();

        return <<<HTML
<div class="layui-form-item layui-{$this->getDisplay()}">
    $label
    <div class="layui-input-{$this->getDisplay()}">
        <i {$attributes}></i>
    </div>
</div>
HTML;
    }
}