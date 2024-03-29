<?php

namespace MaksimPukh\MailMsgProcess;

abstract class MailMsgProcess
{
    protected $form_data;
    protected $named_form_attributes = [];
    protected $named_admin_footer_attributes = [];

    abstract public function getHtmlMsg(): string;

    public function __construct(MailMsgModel $form_data) {
        $this->form_data = $form_data;
        foreach ($form_data->getParseAttributes() as $attribute) {
            $this->named_form_attributes[$form_data->attributeLabels()[$attribute]] = $form_data->$attribute;
        }

        foreach (self::getAdminFooterAttributes() as $attribute) {
            $this->named_admin_footer_attributes[$form_data->attributeLabels()[$attribute]] = $form_data->$attribute;
        }
    }

    public function send(MailSender $mailer): bool {
        $mailer->text = $this->getHtmlMsg();
        $mailer->plain_text = $this->getPlainTextMsg();
        try {
            $mailer->validate();
        }
        catch (MailHtmlTextException | MailToEmailException | MailFromNameException | MailFromEmailException | MailSubjectException $e) {
            throw $e;
        }
        return $mailer->sendEmail();
    }

    public function getPlainTextMsg(): string {
        $html_msg = $this->getHtmlMsg();
        $plain_text_msg = strip_tags($html_msg, "<br>");
        $pattern = "/<br><br>/i";
        $plain_text_msg = preg_replace($pattern, "\n", $plain_text_msg);
        $plain_text_msg = preg_replace("/<br>/i", "", $plain_text_msg);
        return $plain_text_msg;
    }

    public function setAttribute($name, $value): void {
        $this->named_form_attributes[$name] = $value;
    }

    //    todo: добавить тут проверку на неустановленность
    private static function getAdminFooterAttributes(): array {
        $mail_msg_config = MailMsgConfig::getInstance();
        return $mail_msg_config->getProperty("admin_footer_attributes");
    }
}