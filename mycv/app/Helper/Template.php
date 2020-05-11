<?php

namespace App\Helper;
use Config;

class Template {
    public static function showItemHistory($by, $time){
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                            <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('zvn.format.long_time'), strtotime($time)));
        return $xhtml;
    }
}
