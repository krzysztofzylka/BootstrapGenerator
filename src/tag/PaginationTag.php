<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class PaginationTag extends Tag {

    private int $pages;
    private string $href;
    private ?int $actualPage;
    private int $maxPages = 10;

    public function __construct() {
        parent::__construct('nav');
    }

    /**
     * Set pages
     * @param int $pages
     * @return $this
     */
    public function setPages(int $pages) : PaginationTag {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Set actualPage
     * @param ?int $actualPage
     * @return $this
     */
    public function actualPage(?int $actualPage) : PaginationTag {
        $this->actualPage = $actualPage;

        return $this;
    }

    /**
     * Set href
     * @param string $href
     * @return $this
     */
    public function href(string $href) : PaginationTag {
        $this->href = $href;

        return $this;
    }

    public function __toString(): string {
        $left = Html::tag(
            'li',
            Html::a(
                Html::tag('span', '&laquo;')->attribute('aria-hidden', 'true'),
                $this->_prepareHref($this->actualPage - 1)
            )->class('page-link')->attribute('aria-label', 'Previous')
        )->class('page-item');

        $right = Html::tag(
            'li',
            Html::a(
                Html::tag('span', '&raquo;')->attribute('aria-hidden', 'true'),
                $this->_prepareHref($this->actualPage + 1)
            )->class('page-link')->attribute('aria-label', 'Next')
        )->class('page-item');

        $dots = Html::tag(
            'li',
            Html::a(
                '...',
                '#'
            )->class('page-link disabled')
        )->class('page-item');

        $pages = '';
        $prevDots = false;
        $nextDots = false;

        for ($page = 1; $page <= $this->pages; $page++) {
            if ($this->actualPage - ($this->maxPages / 2) > $page) {
                $prevDots = true;

                continue;
            } elseif ($this->actualPage + ($this->maxPages / 2) < $page) {
                $nextDots = true;

                continue;
            }

            $pageHtml = Html::tag('li', Html::a($page, $this->_prepareHref($page))->class('page-link'))->class('page-item');

            if ($this->actualPage === $page) {
                $pageHtml->attribute('aria-current', 'page')->class('active');
            }

            $pages .= $pageHtml;
        }

        if ($prevDots) {
            $pages = $dots . $pages;
        }

        if ($nextDots) {
            $pages .= $dots;
        }

        if (is_null($this->actualPage)) {
            $value = $pages;
        } else {
            if ($this->actualPage === 1) {
                $left->class('disabled');
            }

            if ($this->actualPage === $this->pages) {
                $right->class('disabled');
            }

            $value = $left . $pages . $right;
        }

        $this->value(Html::tag('ul')->class('pagination')->value($value));

        return parent::__toString();
    }

    /**
     * Prepare href
     * @param int $page
     * @return string
     */
    private function _prepareHref(int $page) : string {
        return str_replace('{page}', $page, $this->href);
    }

}