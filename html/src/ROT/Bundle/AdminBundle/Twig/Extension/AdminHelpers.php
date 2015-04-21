<?php

namespace ROT\Bundle\AdminBundle\Twig\Extension;

class AdminHelpers extends \Twig_Extension {
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('show_row', function ($label, $value) {
                return <<<EOF
<div class="show-row">
    <div class="label">$label</div>
    <div class="value">$value</div>
    <div class="clearfix"></div>
</div>
EOF;
            }, array(
                'is_safe' => array('html')
            ))
        );
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('format_seconds', function ($arg) {
                $arg_int = intval($arg);

                return str_pad(floor($arg_int / 3600), 2, '0', STR_PAD_LEFT) . ':' . str_pad(floor($arg_int % 3600 / 60), 2, '0', STR_PAD_LEFT) . ':' . str_pad($arg_int % 60, 2, '0', STR_PAD_LEFT);
            })
        );
    }

    public function getName() {
        return 'rot_show_helpers';
    }
}