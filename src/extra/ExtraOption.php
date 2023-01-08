<?php

namespace krzysztofzylka\BootstrapGenerator\extra;

use krzysztofzylka\BootstrapGenerator\enum\Option;

class ExtraOption {

    public static function action(&$object, $options) : void {
        if (in_array(Option::Active, $options)) {
            $object->class('active')->aria('current', 'page');
        }

        if (in_array(Option::Disabled, $options)) {
            $object->class('disabled')->clearAttribute('href');
        }
    }

}