<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Add checkbox to selector
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'cpc_protected';

// Handle checkbox subpalette
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['cpc_protected'] = 'cpc_cookieName';

// Adjust tl_form palettes
PaletteManipulator::create()
    ->addField('cpc_protected', 'protected_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_page')
;

// Bundle fields
$GLOBALS['TL_DCA']['tl_page']['fields']['cpc_protected'] = [
	'exclude' => true,
	'filter' => true,
	'inputType' => 'checkbox',
	'eval' => array('submitOnChange'=>true),
	'sql' => "char(1) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_page']['fields']['cpc_cookieName'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('rgxp'=>'alias', 'doNotCopy'=>true, 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql' => "varchar(255) NOT NULL default ''"
];