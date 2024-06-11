<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\EventListener;

use ContaoPageCookieBundle\Model\FormCookie;

class SendNotificationMessageListener
{
    public function addTokens($objMessage, &$arrTokens, $strLanguage, $objGatewayModel): bool
    {
        $objCookie = FormCookie::findLastOneByPid($arrTokens['formconfig_id']);

        if (!$objCookie) {
            return true;
        }

        $arrTokens['cpcCookie_name'] = $objCookie->name;
        $arrTokens['cpcCookie_value'] = $objCookie->value;
        $arrTokens['cpcCookie_duration'] = $objCookie->duration;
        $arrTokens['cpcCookie_token'] = $objCookie->token;

        return true;
    }
}
