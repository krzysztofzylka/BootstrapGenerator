<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
use krzysztofzylka\BootstrapGenerator\enum\Size;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class ButtonTag extends Tag {

    private array $badge;

    /**
     * Set tag
     * @param string $tag
     * @return ButtonTag
     */
    public function tag(string $tag = 'div') : ButtonTag {
        parent::__construct($tag);

        return $this;
    }

    /**
     * Button size
     * @param Size $size
     * @return ButtonTag
     */
    public function size(Size $size) : ButtonTag {
        return $this->attribute('class', 'btn-' . $size->value);
    }

    /**
     * Disable
     * @return ButtonTag
     */
    public function disable() : ButtonTag {
        return $this->attribute('disabled')
            ->class('disabled')
            ->attribute('aria-disabled', 'true');
    }

    /**
     * Add badge
     * @param string $value
     * @param BackgroundColor $backgroundColor
     * @return $this
     */
    public function badge(string $value, BackgroundColor $backgroundColor = BackgroundColor::Info) : ButtonTag {
        $this->badge = [
            'value' => $value,
            'background' => $backgroundColor->value
        ];

        return $this;
    }

    public function __toString() : string {
        $value = $this->getValue();

        if (isset($this->badge)) {
            $value .= Html::tag('span', $this->badge['value'])->class('position-absolute top-0 start-100 translate-middle badge rounded-pill bg-' . $this->badge['background']);

            $this->class('position-relative');
        }

        $this->value($value);

        return parent::__toString();
    }

}