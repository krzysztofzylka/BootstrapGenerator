<?php

namespace krzysztofzylka\BootstrapGenerator;

use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
use krzysztofzylka\BootstrapGenerator\enum\ThemeColor;
use krzysztofzylka\BootstrapGenerator\tag\AlertTag;
use krzysztofzylka\BootstrapGenerator\tag\BadgeTag;
use krzysztofzylka\BootstrapGenerator\tag\BreadcrumbTag;
use krzysztofzylka\BootstrapGenerator\tag\ButtonTag;
use krzysztofzylka\HtmlGenerator\Tag;

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
            ->attribute('class', 'alert alert-' . $themeColor->value)
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
            ->attribute('class', 'badge bg-' . $backgroundColor->value);
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
            ->attribute('class', 'btn btn-' . $themeColor->value)
            ->attribute('role', 'button');
    }

}