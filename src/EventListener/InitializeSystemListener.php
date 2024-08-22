<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\EventListener;

use Contao\Form;
use ContaoPageCookieBundle\Classes\CookiesUtil;
use ContaoPageCookieBundle\Model\FormCookie;

class InitializeSystemListener
{
    public function catchCookieToken(): void
    {
        if (array_key_exists('cpc_cookieToken', $_GET)) {
            // Check if we can find a cookie in the database
            $objCookie = FormCookie::findOneByToken($_GET['cpc_cookieToken']);

            // Break if there is no model found
            // or if there is already an active cookie
            if (!$objCookie || $objCookie->active) {
                return;
            }

            // Else, it means we have an unactive cookie on our hands
            // So we will set a cookie and mark it as active
            CookiesUtil::setCookie($objCookie->name, $objCookie->value, $objCookie->duration);

            $objCookie->active = '1';
            $objCookie->tstamp = time();
            $objCookie->save();
        }
    }
}
