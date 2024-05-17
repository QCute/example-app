<?php

namespace App\Admin\Builders\Form;

class Icon extends Field
{
    /**
     * The attributes registered on the controller.
     * 
     * @var array
     */
    public $attributes = [];

    public function render(): string
    {
        $label = $this->formatLabel();

        return <<<HTML
<div class="layui-form-item layui-{$this->getDisplay()}">
    $label
    <div class="layui-input-{$this->getDisplay()}">
        <i class="layui-form-label layui-icon {$this->value}" style="width: auto; padding-left: 0;"></i>
    </div>
</div>
HTML;
    }
}