<?php

namespace krzysztofzylka\BootstrapGenerator\tag\navbar;

use krzysztofzylka\BootstrapGenerator\enum\Option;
use krzysztofzylka\BootstrapGenerator\extra\ExtraOption;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class NavbarDropdownTag extends Tag {

    private string $text;
    private array $elements = [];

    public function __construct(string $value) {
        parent::__construct('div');
        $this->class('nav-item dropdown');
        $this->text = $value;
    }

    /**
     * Add link
     * @param string $value
     * @param string $href
     * @param Option ...$options
     * @return NavbarDropdownTag
     */
    public function addLink(string $value, string $href = '#', Option ... $options) : NavbarDropdownTag {
        $a = Html::a($value, $href)->class('dropdown-item');
        ExtraOption::action($a, $options);
        $this->elements[] = $a;

        return $this;
    }

    public function __toString(): string {
        $value = Html::a($this->text, '#')
                ->class('nav-link dropdown-toggle')
                ->role('button')
                ->attribute('data-bs-toggle', 'dropdown')
            . Html::div(implode('', $this->elements))->class('dropdown-menu');

        $this->value($value);

        return parent::__toString();
    }

}