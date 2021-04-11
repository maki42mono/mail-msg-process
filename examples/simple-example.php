<?php

namespace MaksimPukh\MailMsgProcess;

use Tests\TestModel;

$load_tests = function ($classname) {
    $rule = '/[A-Za-z]+$/i';
    preg_match($rule, $classname, $matches);
    $filename = __DIR__ . "./". $matches[0] .".php";
    $path = str_replace('/', DIRECTORY_SEPARATOR, $filename);

    if (file_exists($path)) {
        require_once($path);
    }
};

$load_source = function ($classname) {
    $rule = '/[A-Za-z]+$/i';
    preg_match($rule, $classname, $matches);
    $filename = __DIR__ . "/../src/". $matches[0] .".php";
    $path = str_replace('/', DIRECTORY_SEPARATOR, $filename);

    if (file_exists($path)) {
        require_once($path);
    }
};



\spl_autoload_register($load_source);
\spl_autoload_register($load_tests);

$test = new TestModel();
print_r($test->test());
$html_admin_msg = new MailAdminHtmlMsg();