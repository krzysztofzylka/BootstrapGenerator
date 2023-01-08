<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\BootstrapGenerator\enum\Option;
use krzysztofzylka\BootstrapGenerator\enum\ThemeColor;
use krzysztofzylka\BootstrapGenerator\extra\ExtraOption;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class DropdownTag extends Tag {

    private ThemeColor $themeColor = ThemeColor::Secondary;
    private array $dropdownItems = [];

    public function __construct() {
        parent::__construct('div');

        $this->class('dropdown');
    }

    /**
     * Change to dropup
     * @return DropdownTag
     */
    public function dropUp() : DropdownTag {
        $this->clearAttribute('class')->class('dropup');

        return $this;
    }

    /**
     * Set theme
     * @param ThemeColor $themeColor
     * @return DropdownTag
     */
    public function theme(ThemeColor $themeColor) : DropdownTag {
        $this->themeColor = $themeColor;

        return $this;
    }

    /**
     * Add dropdown link
     * @param string $value
     * @param string $href
     * @param Option ...$options Disabled / Active
     * @return DropdownTag
     */
    public function addLink(string $value, string $href = '#', Option ...$options) : DropdownTag {
        $a = Html::a($value, $href)->class('dropdown-item');
        ExtraOption::action($a, $options);
        $this->dropdownItems[] = Html::tag('li')->value($a);

        return $this;
    }

    /**
     * Add dropdown header
     * @param string $value
     * @return DropdownTag
     */
    public function addHeader(string $value) : DropdownTag{
        $this->dropdownItems[] = Html::tag('li', Html::tag('h6', $value)->class('dropdown-header'));

        return $this;
    }

    /**
     * Add dropdown separator
     * @return DropdownTag
     */
    public function addSeparator() : DropdownTag{
        $this->dropdownItems[] = Html::tag('li', Html::hr()->class('dropdown-divider'));

        return $this;
    }

    public function __toString(): string {
        $value = Html::tag('button')
                ->class('btn btn-' . $this->themeColor->value . ' dropdown-toggle')
                ->attribute('type', 'button')
                ->attribute('data-bs-toggle', 'dropdown')
                ->attribute('aria-expanded', 'false')
                ->value($this->getValue())
            . Html::tag('ul')->value(implode('', $this->dropdownItems))->class('dropdown-menu');

        $this->value($value);

        return parent::__toString();
    }

}