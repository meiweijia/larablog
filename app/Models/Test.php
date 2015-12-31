<?php
/**
 * ²âÊÔ×¨ÓÃÀà
 * User: Administrator
 * Date: 2015/12/24
 * Time: 20:36
 */

namespace App\Models;


class Test
{
    public  function add_thd($thread)
    {
        $prefix = '';
        $num = substr($thread, 0, -1);
        if (strpos($thread, '.') !== FALSE)
        {
            $prefix = substr($thread, 0, -3);
            $num = substr($thread, -3, 3);
        }
        //48-57 -> 0-9
        $num1 = ord($num[1]);
        if ($num1 < 57)
            return $prefix.$num[0].chr($num1+1).'/';
        if ($num1 == 57)
            return $prefix.$num[0].'a'.'/';
        //97-122 -> a-z
        if ($num1 < 122)
            return $prefix.$num[0].chr($num1+1).'/';
        if ($num1 == 122)
        {
            $num0 = ord($num[0]);
            if ($num0 < 57)
                return $prefix.chr($num0+1).'0/';
            if ($num0 == 57)
                return $prefix.'a0/';
            if ($num0 < 122)
                return $prefix.chr($num0+1).'0/';
        }
    }
}