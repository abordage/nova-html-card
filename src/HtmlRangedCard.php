<?php

declare(strict_types=1);

namespace Abordage\HtmlCard;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\RangedMetric;

class HtmlRangedCard extends RangedMetric
{
    public string $title = '';
    public string $content = '';

    public $width = '1/3';
    public $height = 'fixed';
    public bool $center = true;

    public function __construct()
    {
        parent::__construct('abordage-html-ranged-card');
    }

    public function calculate(NovaRequest $request)
    {
        $value = $request->range ?? $this->selectedRangeKey;
        return $this->content($value);
    }

    public function content(string $value = null): string
    {
        return '';
    }

    public function ranges(): array
    {
        return [];
    }

    public function jsonSerialize(): array
    {
        return array_merge([
            'title' => $this->title,
            'content' => $this->content,
            'height' => '$this->height',
            'center' => $this->center,
        ], parent::jsonSerialize());
    }
}
