<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Tag;

class BadgeTag extends Tag {

    /**
     * Set rounded pill
     * @return BadgeTag
     */
    public function roundedPill() : BadgeTag {
        return $this->class('rounded-pill');
    }

}