<?php

if (!function_exists('random_color')) {
    /**
     * 随机获取 bootstrap 颜色
     *
     * @return array
     */
    function random_color()
    {
        $colorMap=[
            'primary',
            'success',
            'danger',
            'warning',
            'info',
            'dark',
        ];
        return $colorMap[rand(0,5)];
    }
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length);
}
