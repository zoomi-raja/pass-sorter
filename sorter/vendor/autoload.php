<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:26
 * Git: https://github.com/zoomi-raja
 */


define('ROOT', dirname(__DIR__));
define('SLASH', DIRECTORY_SEPARATOR);

spl_autoload_register(function ($className)
{
    $fileName = sprintf("%s%svendor%s%s.php", ROOT, SLASH, SLASH, str_replace("\\", "/", $className));
    var_dump($fileName);
    if (file_exists($fileName))
    {
        require ($fileName);
    }
});