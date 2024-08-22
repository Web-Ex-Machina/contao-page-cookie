<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\Classes;

use Contao\System;

class CookiesUtil
{
    public static function setCookie($strName, $varValue, $intExpires)
    {
        System::setCookie($strName, $varValue, (time() + $intExpires));
    }

    public static function getCookie(?string $strName): array
    {
        return $_COOKIE[$strName];
    }

    public static function hasCookie(?string $strName): bool
    {
        return null !== $_COOKIE[$strName];
    }
}
