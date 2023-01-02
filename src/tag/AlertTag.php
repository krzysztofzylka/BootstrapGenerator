<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Tag;

class AlertTag extends Tag {

    private string $header;
    private string $headerTag = 'h4';

    /**
     * Add header to alert
     * @param string $value
     * @return AlertTag
     */
    public function header(string $value) : self {
        $this->header = $value;

        return $this;
    }

    /**
     * Set header tag
     * @param string $tag
     * @return AlertTag
     */
    public function headerTag(string $tag = 'h4') : self {
        $this->headerTag = $tag;

        return $this;
    }

    public function __toString(): string {
        $value = $this->getValue();

        if (isset($this->header)) {
            $value = (new Tag($this->headerTag))
                    ->value($this->header)
                    ->attribute('class', 'alert-heading')
                . $value;
        }

        $this->value($value);

        return parent::__toString();
    }

}