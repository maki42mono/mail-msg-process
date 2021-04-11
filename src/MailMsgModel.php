<?php


namespace MaksimPukh\MailMsgProcess;


interface MailMsgModel
{
    public function getParseAttributes();
    
    public function attributeLabels();
}