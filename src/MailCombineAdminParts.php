<?php

namespace MaksimPukh\MailMsgProcess;

interface MailCombineAdminParts
{
    public function getAdminHtmlBodyHeader(): string;

    public function getParseAttributes(): array;

    public function getAdminSubject(): string;

    public static function getAdminFromName(): string;

    public static function getAdminFromEmail(): string;

    public static function getAdminToEmail(): string;
}