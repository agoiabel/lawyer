<?php

/**
 * Generate custom unique string
 */
if (!function_exists('custom_unique')) {
    /**
     * Greeting unique value
     *
     * @param  string $person Name
     * @return string
     */
    function custom_unique($string)
    {
        return 'LAW_'. $string .'_'.uniqid().time();
    }
}

/**
 * Generate Custom unique numbers
 */
if (!function_exists('custom_unique_number')) {
    /**
     * Greeting unique value
     *
     * @param  string $person Name
     * @return string
     */
    function custom_unique_number($number)
    {
        return substr(number_format(time() * rand(),0,'',''),0,$number);
    }
}

/**
 * Get Asset link base on APP_URL From .env
 */
if (!function_exists('get_uploaded_asset')) {
    function get_uploaded_asset($file_name) {
        return empty($file_name) ? 'https://res.cloudinary.com/ddmkofmux/image/upload/v1600783513/lh9qyizn4w03gyukljs6.png' : $file_name; 
    }
}
