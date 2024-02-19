<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\Classes;

use Contao\System;
use ContaoPageCookieBundle\Model\FormCookie;

class CookiesUtil
{
    public static function setCookie($strName, $varValue, $intExpires)
    {
        System::setCookie($strName, $varValue, (time() + $intExpires));
    }

    public static function getCookie($strName)
    {
        return $_COOKIE[$strName];
    }

    public static function hasCookie($strName)
    {
        if (null !== $_COOKIE[$strName]) {
            return true;
        }

        return false;
    }
}
