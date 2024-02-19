<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Add ctable to selector
$GLOBALS['TL_DCA']['tl_form']['config']['ctable'][] = 'tl_form_cookie';

// Add button to reach cookies
$GLOBALS['TL_DCA']['tl_form']['list']['operations']['cpcookies'] = [
	'href' => 'table=tl_form_cookie',
	'icon' => 'modules.gif',
];
 
// Add checkbox to selector
$GLOBALS['TL_DCA']['tl_form']['palettes']['__selector__'][] = 'cpc_generateCookie';

// Handle checkbox subpalette
$GLOBALS['TL_DCA']['tl_form']['subpalettes']['cpc_generateCookie'] = 'cpc_cookieName,cpc_cookieValue,cpc_cookieDuration,cpc_generateWhen,cpc_hideIfActiveCookie';

// Adjust tl_form palettes
PaletteManipulator::create()
    ->addLegend('cpc_legend', 'email_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('cpc_generateCookie', 'cpc_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_form')
;

// Bundle fields
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_generateCookie'] = [
	'exclude' => true,
	'filter' => true,
	'inputType' => 'checkbox',
	'eval' => array('submitOnChange'=>true),
	'sql' => "char(1) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_cookieName'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('rgxp'=>'alias', 'doNotCopy'=>true, 'mandatory'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql' => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_cookieValue'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('rgxp'=>'alias', 'doNotCopy'=>true, 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql' => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_cookieDuration'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql' => "int(10) unsigned NOT NULL default 0"
];
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_generateWhen'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => ['whenFormIsSubmitted', 'whenProtectedPageIsReached'],
	'eval' => array('helpwizard'=>true, 'tl_class'=>'w50'),
	'sql' => "varchar(32) NOT NULL default 'raw'"
];
$GLOBALS['TL_DCA']['tl_form']['fields']['cpc_hideIfActiveCookie'] = [
	'exclude' => true,
	'filter' => true,
	'inputType' => 'checkbox',
	'sql' => "char(1) NOT NULL default ''"
];