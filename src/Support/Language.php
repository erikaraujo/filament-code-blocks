<?php

namespace ErikAraujo\FilamentCodeBlocks\Support;

use Tempest\Highlight\Languages\Blade\BladeLanguage;
use Tempest\Highlight\Languages\Css\CssLanguage;
use Tempest\Highlight\Languages\Diff\DiffLanguage;
use Tempest\Highlight\Languages\DocComment\DocCommentLanguage;
use Tempest\Highlight\Languages\Gdscript\GdscriptLanguage;
use Tempest\Highlight\Languages\Html\HtmlLanguage;
use Tempest\Highlight\Languages\JavaScript\JavaScriptLanguage;
use Tempest\Highlight\Languages\JavaScript\JsDocLanguage;
use Tempest\Highlight\Languages\Json\JsonLanguage;
use Tempest\Highlight\Languages\Php\PhpDocCommentLanguage;
use Tempest\Highlight\Languages\Php\PhpLanguage;
use Tempest\Highlight\Languages\Php\PhpTypeLanguage;
use Tempest\Highlight\Languages\Sql\SqlLanguage;
use Tempest\Highlight\Languages\Text\TextLanguage;
use Tempest\Highlight\Languages\Twig\TwigEchoLanguage;
use Tempest\Highlight\Languages\Twig\TwigLanguage;
use Tempest\Highlight\Languages\Twig\TwigTagLanguage;
use Tempest\Highlight\Languages\Xml\XmlLanguage;
use Tempest\Highlight\Languages\Yaml\YamlLanguage;

/**
 * @return class-string<\Tempest\Highlight\Languages\Base\BaseLanguage>
 */
enum Language: string
{
    case Blade = BladeLanguage::class;
    case Css = CssLanguage::class;
    case Diff = DiffLanguage::class;
    case DocComment = DocCommentLanguage::class;
    case Gdscript = GdscriptLanguage::class;
    case Html = HtmlLanguage::class;
    case JavaScript = JavaScriptLanguage::class;
    case JsDoc = JsDocLanguage::class;
    case Json = JsonLanguage::class;
    case PhpDocComment = PhpDocCommentLanguage::class;
    case Php = PhpLanguage::class;
    case PhpType = PhpTypeLanguage::class;
    case Sql = SqlLanguage::class;
    case Text = TextLanguage::class;
    case TwigEcho = TwigEchoLanguage::class;
    case Twig = TwigLanguage::class;
    case TwigTag = TwigTagLanguage::class;
    case Xml = XmlLanguage::class;
    case Yaml = YamlLanguage::class;
}
