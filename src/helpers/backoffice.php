<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 1/13/19
 * Time: 3:22 PM
 */
if (! function_exists('theme')) {
    /**
     * Get the path to the theme folder.
     *
     * @param  string  $path
     * @return string
     */
    function theme($path = '')
    {
        return asset('theme/admin/'.$path);
    }
}