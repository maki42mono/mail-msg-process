<?php


namespace Examples;


use MaksimPukh\MailMsgProcess\MailAdminHtmlMsg;
use MaksimPukh\MailMsgProcess\MailMsgConfig;
use Tests\TestMailer;
use Tests\TestModel;

class Examples
{
    public function getSimpleExample()
    {
//        задаем на футер на все приложение
        $mail_msg_config = MailMsgConfig::getInstance();
        $mail_msg_config->setProperty("admin_footer_attributes", ["timestamp"]);

//        создаем модель с данными
        $test = new TestModel();
        $test->name = "Константин";
        $test->surname = "КОНСТАНТИНОПОЛЬСКИЙ";
        $test->timestamp = date('Y-m-d');
        $test->email = "test@makimono.ru";

//        создаем отправитель для админа
        $html_admin_msg = new MailAdminHtmlMsg($test);
        $html_admin_msg->setAttribute($test->attributeLabels()["surname"], mb_convert_case($test->surname, MB_CASE_TITLE, "UTF-8"));

//        вот html-версия письма!
        print_r($html_admin_msg->getHtmlMsg());
        print_r ("<br>");

//        вот текстовая версия письма
        print_r($html_admin_msg->getPlainTextMsg());
        print_r ("<br>");

//        инициируем отправителя и задаем обязательные параметры
        $user_sender = new TestMailer();
//        указываем в отправителе, на какую почту отправить письмо. Или нет
        rand(0, 1) && $user_sender->to_email = $test->email;
        $user_sender->from_email = $test::getAdminFromName();
        $user_sender->from_name = $test::getAdminFromName();
        $user_sender->subject = $test->getAdminSubject();

        print_r ("<br>");

//        пытаемся отправить письмо. Не получилось — держи ошибку
        $html_admin_msg->send($user_sender);
    }
}