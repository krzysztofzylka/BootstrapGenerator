<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
use krzysztofzylka\BootstrapGenerator\enum\Option;
use krzysztofzylka\BootstrapGenerator\enum\Size;
use krzysztofzylka\BootstrapGenerator\extra\ExtraOption;
use krzysztofzylka\BootstrapGenerator\tag\navbar\NavbarDropdownTag;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class NavbarTag extends Tag {

    private Tag $brand;
    private array $elements = [];
    private array $endElements = [];
    private string $position = 'left';
    private string $id = 'navbar';
    private Size $navbarExpendSize = Size::Md;

    /**
     * Construct
     * @param BackgroundColor|null $backgroundColor
     */
    public function __construct(?BackgroundColor $backgroundColor = BackgroundColor::BodyTertiary) {
        parent::__construct('nav');

        $this->class('navbar');

        if (!is_null($backgroundColor)) {
            $this->class('bg-' . $backgroundColor->value);
        }
    }

    /**
     * Add brand
     * @param string $text
     * @param ?string $href
     * @return $this
     */
    public function addBrand(string $text, ?string $href = null) : NavbarTag {
        if (is_null($href)) {
            $this->brand = Html::tag('span')->value($text)->class('navbar-brand');
        } else {
            $this->brand = Html::a($text, $href)->class('navbar-brand');
        }

        return $this;
    }

    /**
     * Change navbar expand size
     * @param Size $size
     * @return $this
     */
    public function setExpandSize(Size $size) : NavbarTag {
        $this->navbarExpendSize = $size;

        return $this;
    }

    /**
     * Set position
     * @param string $position left / right
     * @return $this
     */
    public function setPosition(string $position = 'left') : NavbarTag {
        $this->position = $position;

        return $this;
    }

    /**
     * Add link
     * @param string $value
     * @param string $href
     * @param Option ...$options Active, Disabled
     * @return NavbarTag
     */
    public function addLink(string $value, string $href = '#', Option ...$options) : NavbarTag {
        $link = Html::a($value, $href)->class('nav-link');
        ExtraOption::action($link, $options);
        $this->_addElement($link);

        return $this;
    }

    /**
     * Add text
     * @param string $value
     * @return $this
     */
    public function addText(string $value) : NavbarTag {
        $this->_addElement(Html::span($value)->class('navbar-text'));

        return $this;
    }

    /**
     * Add dropdown menu
     * @param NavbarDropdownTag $navbarDropdownTag
     * @return $this
     */
    public function addDropdownMenu(NavbarDropdownTag $navbarDropdownTag) : NavbarTag {
        $this->_addElement($navbarDropdownTag);

        return $this;
    }

    /**
     * Add custom html code
     * @param string|Tag $html
     * @return $this
     */
    public function addCustom(string|Tag $html) : NavbarTag {
        $this->_addElement((string)$html);

        return $this;
    }

    /**
     * Create html string
     * @return string
     */
    public function __toString() : string {
        $this->class('navbar-expand-' . $this->navbarExpendSize->value);

        $this->value(
            BootstrapGenerator::containerFluid(
                $this->brand
                    . $this->_generatePhoneButton()
                    . Html::div(
                        Html::div(implode('', $this->elements))->class('navbar-nav')
                            . Html::div(implode('', $this->endElements))->class('navbar-nav ms-auto')
                    )->class('collapse navbar-collapse')->id($this->id)
            )
        );

        return parent::__toString();
    }

    /**
     * Generate phone button
     * @return string
     */
    private function _generatePhoneButton() : string {
        return Html::tag('button', Html::span('')->class('navbar-toggler-icon'))
            ->class('navbar-toggler')
            ->attribute('type', 'button')
            ->attribute('data-bs-toggle', 'collapse')
            ->attribute('data-bs-target', '#' . $this->id)
            ->aria('controls', $this->id)
            ->aria('expanded', 'false')
            ->aria('label', 'Toggle navigation');
    }

    /**
     * Add element
     * @param $element
     * @return void
     */
    private function _addElement($element) : void {
        if ($this->position === 'right') {
            $this->endElements[] = (string)$element;

            return;
        }

        $this->elements[] = (string)$element;
    }

}