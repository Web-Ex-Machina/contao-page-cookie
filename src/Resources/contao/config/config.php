<?php

declare(strict_types=1);

use ContaoPageCookieBundle\Model\FormCookie;

// Add subtable to tl_form
$GLOBALS['BE_MOD']['content']['form']['tables'][] = 'tl_form_cookie';

// Register models
$GLOBALS['TL_MODELS'][FormCookie::getTable()] = FormCookie::class;

// Add tokens to NC
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['contao']['core_form']['email_text'][] = 'cpcCookie_*';
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['contao']['core_form']['email_html'][] = 'cpcCookie_*';