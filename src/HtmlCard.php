<?php

namespace Abordage\HtmlCard;

use Laravel\Nova\Card;

class HtmlCard extends Card
{
    public string $title = '';
    public string $content = '';

    public $width = '1/3';
    public $height = 'fixed';
    public bool $center = true;

    public function __construct()
    {
        parent::__construct('abordage-html-card');
        if (request()->is('nova-api/metrics/*')) {
            return;
        }

        $this->content = $this->content();
    }

    public function content(): string
    {
        return '';
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
