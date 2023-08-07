<?php declare(strict_types=1);
namespace Controllers;

class Index_Controller
{
    public static function show_index(): never
    {
        echo 'yup from index';
        exit();
    }
}
