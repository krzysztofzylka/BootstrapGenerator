<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Tag;

class BadgeTag extends Tag {

    /**
     * Set rounded pill
     * @return BadgeTag
     */
    public function roundedPill() : BadgeTag {
        $this->attribute('class', 'rounded-pill');

        return $this;
    }

}