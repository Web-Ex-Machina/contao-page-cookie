<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\Model;

use Contao\Model;

class FormCookie extends Model
{
	/**
     * Table name.
     *
     * @var string
     */
    protected static $strTable = 'tl_form_cookie';

    public static function findItemsDueToExpireSoon($time) 
    {
        
    }

    public static function findExpiredItems() 
    {
        
    }
}