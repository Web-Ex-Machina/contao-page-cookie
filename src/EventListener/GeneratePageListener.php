<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\EventListener;

use Contao\PageError403;
use Contao\PageRegular;
use Contao\LayoutModel;
use Contao\PageModel;
use ContaoPageCookieBundle\Classes\CookiesUtil;

class GeneratePageListener
{
    public function __invoke(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
    	// Break if page does not require a cookie
        if (!$pageModel->cpc_protected) {
        	return;
        }

        // Generate a 403 if there is no cookie
        if (!CookiesUtil::hasCookie($pageModel->cpc_cookieName)) {
        	$objPage = new PageError403();
        	$objPage->getResponse();
        }

        // Else, let Contao picks up the process
    }
}