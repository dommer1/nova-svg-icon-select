<?php

namespace Dommer1\NovaSVGIconSelect;

use Laravel\Nova\Fields\Field;

class NovaSVGIconSelect extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-svg-icon-select';

    public ?string $svgPath = null;

    public ?string $color = null;

    public array $options = [];

    public function svgPath(string $svgPath): self
    {
        $this->svgPath = $svgPath;

        return $this;
    }

    public function color(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $options = collect($this->options ?: config('nova-svg-icon.icons'))
            ->map(fn ($label, $key) => ['value' => $key, 'label' => $label])
            ->values();

        return array_merge(parent::jsonSerialize(), [
            'options' => $options,
            'svgPath' => $this->svgPath ?: config('nova-svg-icon.svgPath'),
            'color' => $this->color ?: config('nova-svg-icon.color'),
        ]);
    }
}
