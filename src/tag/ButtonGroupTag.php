<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Tag;

class ButtonGroupTag extends Tag {

    private array $buttons = [];

    public function __construct() {
        parent::__construct('div');

        $this->class('btn-group')->attribute('role', 'group');
    }

    /**
     * Add button
     * @param ButtonTag $button
     * @return ButtonGroupTag
     */
    public function addButton(ButtonTag $button) : ButtonGroupTag {
        $this->buttons[] = (string)$button;

        return $this;
    }

    public function __toString(): string {
        $this->value(implode('', $this->buttons));

        return parent::__toString();
    }

}