<?php

if (!function_exists('slugUnicode')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function slugUnicode($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
