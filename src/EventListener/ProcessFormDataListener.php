<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\EventListener;

use Contao\Form;
use ContaoPageCookieBundle\Classes\CookiesUtil;
use ContaoPageCookieBundle\Model\FormCookie;

class ProcessFormDataListener
{
    public function generateCookie(array $submittedData, 
        array $formData, 
        ?array $files, 
        array $labels, 
        Form $form
    ): void
    {
        // Break if this form is not concerned by cookies
        if (!$form->cpc_generateCookie) {
            return;
        }

        // Generate the cookie model
        $objCookie = new FormCookie();
        $objCookie->pid = $form->id;
        $objCookie->tstamp = time();
        $objCookie->createdAt = time();
        $objCookie->name = $form->cpc_cookieName;
        $objCookie->value = $form->cpc_cookieValue;
        $objCookie->duration = $form->cpc_cookieDuration;
        $objCookie->token = bin2hex(random_bytes(16));
        $objCookie->active = 'whenFormIsSubmitted' === $form->cpc_generateWhen ? '1' : '';
        $objCookie->save();

        if ('whenFormIsSubmitted' === $form->cpc_generateWhen) {
            CookiesUtil::setCookie($form->cpc_cookieName, $form->cpc_cookieValue, $form->cpc_cookieDuration);
        }
    }
}
