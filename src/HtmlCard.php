<?php

declare(strict_types=1);

namespace Abordage\HtmlCard;

use Laravel\Nova\Card;
use \Closure;

class HtmlCard extends Card
{
    public $component = 'abordage-html-card';

    public string|Closure|null $title = '';
    public string|Closure|null $content = '';

    public bool $center = true;

    public function withContent(string|Closure|null $content = ''): static
    {
        $this->content = $content;
        return $this;
    }

    public function withTitle(string|Closure|null $title = ''): static
    {
        $this->title = $title;
        return $this;
    }

    public function centered(bool $center = true): static
    {
        return $this->center = $center;
        return $this;
    }

    /**
     * The evaluated content.
     */
    public function content(): ?string
    {
        return $this->content instanceof Closure ? ($this->content)($this) : $this->content;
    }

    /**
     * The evaluated title.
     */
    public function title(): ?string
    {
        return $this->title instanceof Closure ? ($this->title)($this) : $this->title;
    }

    public function jsonSerialize(): array
    {
        return array_merge([
            'title' => $this->title,
            'content' => $this->content,
            'height' => $this->height,
            'center' => $this->center,
        ], parent::jsonSerialize());
    }
}
