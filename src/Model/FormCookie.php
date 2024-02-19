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

    public static function findLastOneByPid($intPid)
    {
        $t = static::$strTable;
        $arrColumns = array("$t.pid=?");

        if (!isset($arrOptions['order']))
        {
            $arrOptions['order'] = "$t.createdAt DESC";
        }

        return static::findOneBy($arrColumns, [$intPid], $arrOptions);
    }

    public static function findItemsDueToExpireSoon($time) 
    {
        
    }

    public static function findExpiredItems() 
    {
        
    }
}