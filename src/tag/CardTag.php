<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class CardTag extends Tag {

    private string $title;
    private string $subTitle;
    private array $topImage;
    private array $cardLinks = [];
    private string $header;
    private string $footer;

    public function __construct() {
        parent::__construct('div');
        $this->attribute('class', 'card');
    }

    /**
     * Set title
     * @param string $title
     * @return CardTag
     */
    public function title(string $title) : CardTag {
        $this->title = $title;

        return $this;
    }

    /**
     * Set header
     * @param string $header
     * @return CardTag
     */
    public function header(string $header) : CardTag {
        $this->header = $header;

        return $this;
    }

    /**
     * Set footer
     * @param string $footer
     * @return CardTag
     */
    public function footer(string $footer) : CardTag {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Add link
     * @param string $value
     * @param string $href
     * @return CardTag
     */
    public function addLink(string $value, string $href = '#') : CardTag {
        $this->cardLinks[] = (string)Html::a($value, $href)->attribute('class', 'card-link');

        return $this;
    }

    /**
     * Set sub-title
     * @param $subTitle
     * @return CardTag
     */
    public function subTitle($subTitle) : CardTag {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Set top image
     * @param string $src
     * @param string $alt
     * @return CardTag
     */
    public function topImage(string $src, string $alt = 'Image') : CardTag {
        $this->topImage = [
            'src' => $src,
            'alt' => $alt
        ];

        return $this;
    }

    public function __toString(): string {
        $text = $this->getValue();
        $value = (isset($this->header) ? Html::tag('div', $this->header)->attribute('class', 'card-header') : '')
            . (isset($this->topImage) ? Html::img($this->topImage['src'])->alt($this->topImage['alt'])->attribute('class', 'card-img-top') : '')
            . Html::tag(
                'div',
                (isset($this->title) ? Html::tag('h5', $this->title)->attribute('class', 'card-title') : '')
                    . (isset($this->subTitle) ? Html::tag('h6', $this->title)->attribute('class', 'card-subtitle mb-2 text-muted') : '')
                    . Html::tag('p', $text)->attribute('class', 'card-text')
                    . implode('', $this->cardLinks)
            )->attribute('class', 'card-body')
            . (isset($this->footer) ? Html::tag('div', $this->footer)->attribute('class', 'card-footer') : '');

        $this->value($value);

        return parent::__toString();
    }

}