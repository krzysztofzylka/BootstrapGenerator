<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
use krzysztofzylka\BootstrapGenerator\enum\Size;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class NavbarTag extends Tag {

    private Tag $brand;
    private array $elements = [];
    private string $id = 'navbar';
    private Size $navbarExpendSize = Size::Md;

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

    public function __construct(?BackgroundColor $backgroundColor = BackgroundColor::BodyTertiary) {
        parent::__construct('nav');

        $this->class('navbar');

        if (!is_null($backgroundColor)) {
            $this->class('bg-' . $backgroundColor->value);
        }
    }

    public function __toString() : string {
        $value = implode('', $this->elements);
        $this->class('navbar-expand-' . $this->navbarExpendSize->value);

        $this->value(
            BootstrapGenerator::containerFluid(
                $this->brand
                    . $this->_generatePhoneButton()
                    . Html::div($value)->class('collapse navbar-collapse')->id($this->id)
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

}