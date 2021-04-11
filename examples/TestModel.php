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

    public function test()
    {
        return "test!";
    }

    public function getParseAttributes()
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