<?php

namespace MaksimPukh\MailMsgProcess;

interface MailCombineUserParts
{
    public function getUserHtmlBodyHeader(): string;

    public function getUserFromEmail(): string;

    public function getUserFromName(): string;

    public function getUserSubject(): string;
}