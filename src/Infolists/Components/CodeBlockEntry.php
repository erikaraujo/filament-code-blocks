<?php

namespace ErikAraujo\FilamentCodeBlocks\Infolists\Components;

use ErikAraujo\FilamentCodeBlocks\Exceptions\FilamentCodeBlocksException;
use ErikAraujo\FilamentCodeBlocks\Support\Language;
use ErikAraujo\FilamentCodeBlocks\Support\Theme;
use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\CanBeCopied;
use Illuminate\Support\HtmlString;
use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Languages\Base\BaseLanguage;
use Tempest\Highlight\Themes\CssTheme;
use Tempest\Highlight\Themes\InlineTheme;

class CodeBlockEntry extends Entry
{
    use CanBeCopied;
    // use Concerns\HasFontFamily;
    // use Concerns\HasWeight;

    /**
     * @var view-string
     */
    protected string $view = 'filament-code-blocks::infolists.components.code-block-entry';

    protected string | BaseLanguage | Language $language = Language::Json;

    protected bool $shouldDisplayGutter = true;

    protected int $gutterStartAt = 1;

    protected string | Theme $theme = Theme::HighlightTempest;

    protected bool $shouldUseInlineTheme = false;

    public function language(string | BaseLanguage | Language $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function withGutter(bool $shouldDisplayGutter = true): static
    {
        $this->shouldDisplayGutter = $shouldDisplayGutter;

        return $this;
    }

    public function gutterStartsAt(int $gutterStartAt): static
    {
        $this->gutterStartAt = $gutterStartAt;

        return $this;
    }

    public function theme(string $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    public function inlineTheme(bool $shouldUseInlineTheme = true): static
    {
        $this->shouldUseInlineTheme = $shouldUseInlineTheme;

        return $this;
    }

    public function getLanguage(): string
    {
        $language = $this->language;

        if ($language instanceof Language) {
            $language = $language->value;
        }

        if (is_string($language) && class_exists($language)) {
            $language = new $language();

            if (! $language instanceof BaseLanguage) {
                throw new FilamentCodeBlocksException('The language class must be an instance of ' . BaseLanguage::class);
            }
        }

        if ($language instanceof BaseLanguage) {
            return $language->getName();
        }

        return $language;
    }

    public function getShouldDisplayGutter(): bool
    {
        return $this->shouldDisplayGutter;
    }

    public function getGutterStartsAt(): int
    {
        return $this->gutterStartAt;
    }

    public function getTheme(): string
    {
        if ($this->theme instanceof Theme) {
            return $this->theme->value;
        }

        return $this->theme;
    }

    public function getShouldUseInlineTheme(): bool
    {
        return $this->shouldUseInlineTheme;
    }

    public function getState(): HtmlString
    {
        $state = parent::getState();

        if (is_array($state)) {
            $state = json_encode($state, JSON_PRETTY_PRINT);
        }

        if (! is_string($state)) {
            throw new FilamentCodeBlocksException('The state for the code block must be a string or an array.');
        }

        $theme = $this->getShouldUseInlineTheme()
            ? new InlineTheme(base_path() . "/vendor/tempest/highlight/src/Themes/Css/{$this->getTheme()}.css")
            : new CssTheme();

        $highlighter = new Highlighter($theme);

        if ($this->getShouldDisplayGutter()) {
            $highlighter = $highlighter->withGutter($this->getGutterStartsAt());
        }

        $state = $highlighter->parse($state, $this->getLanguage());

        return new HtmlString($state);
    }
}
