<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

class SendNotificationMessageListener
{
    #[AsHook('sendNotificationMessage')]
    public function addTokens($objMessage, &$arrTokens, $strLanguage, $objGatewayModel)
    {
        dump($objMessage);
        die;

        $objCookie = FormCookie::findOneByToken('bla');

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
