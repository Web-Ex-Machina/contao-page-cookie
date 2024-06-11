<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

use Contao\DataContainer;
use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_form_cookie'] =
    [
	// Config
	'config' =>
        [
		'dataContainer'               => DC_Table::class,
		'enableVersioning'            => true,
		'ptable'                      => 'tl_form',
		'sql' =>
            [
			'keys' =>
                [
				'id' => 'primary',
				'pid,active' => 'index'
                ]
            ]
        ],

	// List
	'list' =>
        [
		'sorting' =>
            [
			'mode'                    => DataContainer::MODE_PARENT,
			'fields'                  => ['createdAt'],
			'panelLayout'             => 'filter;search,limit',
			'headerFields'            => ['title', 'tstamp', 'formID', 'storeValues', 'sendViaEmail', 'recipient', 'subject'],
			'child_record_callback'   => [ContaoPageCookieBundle\DataContainer\FormCookieContainer::class, 'listRows']
            ],
		'global_operations' =>
            [
			'all' =>
                [
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
                ]
            ],
		'operations' =>
            [
			'edit' =>
                [
				'href'                => 'act=edit',
				'icon'                => 'edit.svg'
                ],
			'delete' =>
                [
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"'
                ],
			'toggle' =>
                [
				'href'                => 'act=toggle&amp;field=active',
				'icon'                => 'visible.svg'
                ],
			'show' =>
                [
				'href'                => 'act=show',
				'icon'                => 'show.svg'
                ]
            ]
        ],

	// Palettes
	'palettes' =>
        [
		'default'                     => '{global_legend},name,value,createdAt,duration,token,active',
        ],

	// Fields
	'fields' =>
        [
		'id' =>
            [
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
            ],
		'pid' =>
            [
			'foreignKey'              => 'tl_form.title',
			'sql'                     => "int(10) unsigned NOT NULL default 0",
			'relation'                => ['type'=>'belongsTo', 'load'=>'lazy']
            ],
		'tstamp' =>
            [
			'sql'                     => "int(10) unsigned NOT NULL default 0"
            ],
		'name' =>
            [
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => ['mandatory'=>true, 'rgxp'=>'alias', 'maxlength'=>255, 'tl_class'=>'w50 clr'],
			'sql'                     => "varchar(255) NOT NULL default ''"
            ],
		'value' =>
            [
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => ['mandatory'=>true, 'rgxp'=>'alias', 'maxlength'=>255, 'tl_class'=>'w50 clr'],
			'sql'                     => "varchar(255) NOT NULL default ''"
            ],
		'createdAt' => [
            'exclude' => true,
            'inputType' => 'text',
            'default' => time(),
            'filter' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 5,
            'eval' => ['rgxp' => 'datim', 'mandatory' => true, 'tl_class' => 'w50'],
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'duration' => [
            'exclude' => true,
			'inputType' => 'text',
			'eval' => ['rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'],
			'sql' => "int(10) unsigned NOT NULL default 0"
        ],
		'token' => [
            'exclude' => true,
            'inputType' => 'text',
            'filter' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'eval' => ['mandatory' => true, 'tl_class' => 'w50'],
            'sql' => "varchar(1024) NOT NULL default ''",
        ],
		'active' =>
            [
			'exclude'                 => true,
			'toggle'                  => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'sql'                     => "char(1) NOT NULL default ''"
            ]
        ]
    ];