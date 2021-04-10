<?php

namespace MaksimPukh\MailMsgProcess;

class MailUserHtmlMsg extends MailMsgProcess
{
    public function getHtmlMsg(): string {
        $msg = "";
        $msg .= $this->form_data->getUserHtmlBodyHeader();
        $msg .= "<br><br>";

        $form_data = $this->form_data;
        $bonus_track = function () use ($form_data) {
            $form_class = new \ReflectionClass(get_class($form_data));
            if ($form_class->hasMethod("getBonusTrack")) {
                return $form_data->getBonusTrack();
            }

            return self::getBonusTrack();
        };
        $msg .= $bonus_track();
        $msg .= "<br><br>";

        $msg .= self::getUserContactsFooter();

        return $msg;
    }

    protected static function getBonusTrack(): string
    {
        $mail_msg_config = MailMsgConfig::getInstance();
        return $mail_msg_config->getProperty("bonus_track");
    }

    protected static function getUserContactsFooter(): string
    {
        $mail_msg_config = MailMsgConfig::getInstance();
        return $mail_msg_config->getProperty("contacts_footer");
    }
}