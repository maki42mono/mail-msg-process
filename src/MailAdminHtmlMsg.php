<?php

namespace MaksimPukh\MailMsgProcess;

class MailAdminHtmlMsg extends MailMsgProcess
{
    public function getHtmlMsg(): string {
        $msg = "";
        $msg .= $this->form_data->getAdminHtmlBodyHeader();
        $msg .= "<br><br>";

        foreach ($this->named_form_attributes as $name => $value) {
            if ($value == null)
                continue;
            $msg .= "<b>{$name}</b>: {$value}<br>\r\n";
        }
        $msg .= "<br>\r\n";


        foreach (self::getAdminFooterAttributeNames() as $attribute => $attribute_name) {
            $value = $this->form_data->$attribute;
            if ($value == null)
                continue;
            $msg .= "<b>{$attribute_name}</b>: {$value}<br>\r\n";
        }

        return $msg;
    }

    public static function getAdminFooterAttributeNames(): array {
        $mail_msg_config = MailMsgConfig::getInstance();
        return $mail_msg_config->getProperty("admin_footer_attribute_names");
    }
}