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

$mail_msg_config = MailMsgConfig::getInstance();
$mail_msg_config->setProperty("admin_footer_attributes", ["timestamp"]);


$test = new TestModel();
$test->email = "test@makimono.ru";
$test->name = "Константин";
$test->surname = "Константинопольский";
$test->timestamp = date('Y-m-d');

$html_admin_msg = new MailAdminHtmlMsg($test);
print_r($html_admin_msg->getHtmlMsg());
echo "\r\n";
echo($html_admin_msg->getPlainTextMsg());