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


        foreach ($this->named_admin_footer_attributes as $name => $value) {
            if ($value == null)
                continue;
            $msg .= "<b>{$name}</b>: {$value}<br>\r\n";
        }

        return $msg;
    }
}