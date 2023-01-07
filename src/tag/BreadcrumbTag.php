<?php

namespace krzysztofzylka\BootstrapGenerator\tag;

use krzysztofzylka\BootstrapGenerator\enum\BreadcrumbDivider;
use krzysztofzylka\HtmlGenerator\Html;
use krzysztofzylka\HtmlGenerator\Tag;

class BreadcrumbTag extends Tag {

    private array $breadcrumbs = [];

    public function __construct() {
        $this->value('');
        $this->attribute('aria-label', 'breadcrumb');

        parent::__construct('nav');
    }

    /**
     * Change divider
     * @param BreadcrumbDivider $divider
     * @return BreadcrumbTag
     */
    public function divider(BreadcrumbDivider $divider) : BreadcrumbTag {
        switch ($divider) {
            case BreadcrumbDivider::Slash:
                $this->clearAttribute('style');
                break;
            case BreadcrumbDivider::None:
                $this->attribute('style', "--bs-breadcrumb-divider: '';", true);
                break;
            case BreadcrumbDivider::Arrow:
                $this->attribute('style', "--bs-breadcrumb-divider: '>';", true);
                break;
        }

        return $this;
    }

    /**
     * Add breadcrumb
     * @param string $value
     * @param bool $active
     * @param ?string $href
     * @return $this
     */
    public function addBreadcrumb(string $value, bool $active = false, ?string $href = null) : BreadcrumbTag {
        $this->breadcrumbs[] = ['value' => $value, 'active' => $active, 'href' => $href];

        return $this;
    }

    public function __toString(): string {
        $breadcrumbs = '';

        foreach ($this->breadcrumbs as $breadcrumb) {
            if (!is_null($breadcrumb['href'])) {
                $breadcrumb['value'] = Html::a($breadcrumb['value'], $breadcrumb['href']);
            }

            $breadCrumbTag = Html::tag('li', $breadcrumb['value'])->class('breadcrumb-item');

            if ($breadcrumb['active']) {
                $breadCrumbTag->class('active')->attribute('aria-current', 'page');
            }

            $breadcrumbs .= $breadCrumbTag;
        }

        $this->value(Html::tag('ol')->class('breadcrumb')->value($breadcrumbs));

        return parent::__toString();
    }

}