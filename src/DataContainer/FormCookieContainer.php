<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\DataContainer;

class FormCookieContainer
{
    public function listRows($r): string
    {
        return sprintf(
            '%s / %s / %s - %s',
            $r['name'],
            $r['value'],
            $r['createdAt'],
            $r['duration'],
        );
    }
}
