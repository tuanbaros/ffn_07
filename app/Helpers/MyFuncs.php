<?php

namespace App\Helpers;

class MyFuncs
{
    public static function handleTitle($string, $num)
    {
        $arr = explode(' ', $string);
        $description = '';
        if (count($arr) > $num) {
            for ($i = 0; $i < $num; $i++) {
                $description .= $arr[$i] . ' ';
            }
        } else {
            $description = $string;
        }
        $description .= ' ...';
        return $description;
    }
}
