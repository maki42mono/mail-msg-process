<?php


namespace Tests;

use MaksimPukh\MailMsgProcess\MailCombineAdminParts;
use MaksimPukh\MailMsgProcess\MailMsgModel;

class TestModel implements MailMsgModel, MailCombineAdminParts
{

    public $email;
    public $name;
    public $surname;
    public $timestamp;

    public function getAdminHtmlBodyHeader(): string
    {
        return "<b>Привет!</b><br>\r\n
Я <i>есть</i> письмо…<br>";
    }

    public function getAdminSubject(): string
    {
        return "Тема письма";
    }

    public static function getAdminFromEmail(): string
    {
        return "happyadmin@makimono.ru";
    }

    public static function getAdminFromName(): string
    {
        return "Священный Максим";
    }

    public static function getAdminToEmail(): string
    {
        return "happynotify@makimono.ru";
    }

    public function getParseAttributes(): array
    {
        return [
            'email',
            'name',
            'surname',
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'timestamp' => 'Дата и время отправки',
        ];
    }
}