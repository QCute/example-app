<?php

namespace App\Admin\Builders\Form;

class IconOption extends Field
{
    public function value(string $value): static
    {
        $this->attributes['value'] = $value;

        return $this;
    }

    public function select(bool $select = true): static
    {
        if(!$select) {
            unset($this->attributes['selected']);
        } else {
            $this->attributes['selected'] = 'selected';
        }

        return $this;
    }

    public function render(): string
    {
        $attributes = $this->formatAttributes();

        $value = $this->attributes['value'] ?? '';

        if($value === '') {
            return <<<HTML
    <option $attributes>{$this->label}</option>
HTML;            
        }

        return <<<HTML
<option $attributes><i class="layui-icon {$value}" style="margin-right: 4px;"></i>{$this->label}</option>
HTML;
    }
}
