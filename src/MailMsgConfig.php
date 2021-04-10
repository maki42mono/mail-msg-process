<?php

namespace MaksimPukh\MailMsgProcess;

class MailMsgConfig
{
    private $props = [];
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new MailMsgConfig();
        }
        return self::$instance;
    }

    public function setProperty(string $key, $value)
    {
        $this->props[$key] = $value;
    }

    public function getProperty(string $key)
    {
        return $this->props[$key];
    }
}