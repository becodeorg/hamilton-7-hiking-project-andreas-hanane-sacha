<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function abort($code = 404):void
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

#[NoReturn] function dd($value):void
{
    echo"<pre>";
    var_dump($value);
    echo"</pre>";
    die();
}
