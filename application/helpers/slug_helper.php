<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 23/10/2017
 * Time: 2:55 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
}

?>