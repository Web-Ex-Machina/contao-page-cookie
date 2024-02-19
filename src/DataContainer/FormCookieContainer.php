<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\DataContainer;

class FormCookieContainer
{
    public function listRows($r)
    {
        return sprintf(
            '%s / %s / %s - %s',
            $r['name'],
            $r['value'],
            $r['createdAt'],
            $r['expiresAt'],
        );
    }
}
