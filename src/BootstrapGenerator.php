<?php

namespace krzysztofzylka\BootstrapGenerator;

use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
use krzysztofzylka\BootstrapGenerator\enum\ThemeColor;
use krzysztofzylka\BootstrapGenerator\tag\AlertTag;
use krzysztofzylka\BootstrapGenerator\tag\BadgeTag;
use krzysztofzylka\BootstrapGenerator\tag\BreadcrumbTag;
use krzysztofzylka\BootstrapGenerator\tag\ButtonGroupTag;
use krzysztofzylka\BootstrapGenerator\tag\ButtonTag;
use krzysztofzylka\BootstrapGenerator\tag\CardTag;
use krzysztofzylka\BootstrapGenerator\tag\DropdownTag;
use krzysztofzylka\BootstrapGenerator\tag\PaginationTag;

class BootstrapGenerator {

    /**
     * Create alert
     * @param string $value
     * @param ThemeColor $themeColor
     * @return AlertTag
     */
    public static function alert(string $value, ThemeColor $themeColor = ThemeColor::Primary) : AlertTag {
        return (new AlertTag('div'))
            ->value($value)
            ->class('alert alert-' . $themeColor->value)
            ->attribute('role', 'alert');
    }

    /**
     * Create badge
     * @param string $value
     * @param BackgroundColor $backgroundColor
     * @return BadgeTag
     */
    public static function badge(string $value, BackgroundColor $backgroundColor = BackgroundColor::Primary) : BadgeTag {
        return (new BadgeTag('span'))
            ->value($value)
            ->class('badge bg-' . $backgroundColor->value);
    }

    /**
     * Create breadcrumb
     * @return BreadcrumbTag
     */
    public static function breadcrumb() : BreadcrumbTag {
        return (new BreadcrumbTag());
    }

    /**
     * Create button
     * @param string $value
     * @param ThemeColor $themeColor
     * @return ButtonTag
     */
    public static function button(string $value, ThemeColor $themeColor = ThemeColor::Primary) : ButtonTag {
        return (new ButtonTag('button'))
            ->value($value)
            ->class('btn btn-' . $themeColor->value)
            ->attribute('role', 'button');
    }

    /**
     * Create button group
     * @return ButtonGroupTag
     */
    public static function buttonGroup() : ButtonGroupTag {
        return (new ButtonGroupTag());
    }

    /**
     * Create card
     * @param ?string $value
     * @return CardTag
     */
    public static function card(?string $value = null) : CardTag {
        return (new CardTag())->value($value);
    }

    /**
     * Create dropdown
     * @param string $value
     * @param ThemeColor $themeColor
     * @return DropdownTag
     */
    public static function dropdown(string $value, ThemeColor $themeColor = ThemeColor::Secondary) : DropdownTag {
        return (new DropdownTag())->value($value)->theme($themeColor);
    }

    /**
     * Create pagination
     * @param int $pages
     * @param string $href link with {page}
     * @param ?int $actualPage
     * @return PaginationTag
     */
    public static function pagination(int $pages, string $href, ?int $actualPage = null) : PaginationTag {
        return (new PaginationTag())->setPages($pages)->href($href)->actualPage($actualPage);
    }

}