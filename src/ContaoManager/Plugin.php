<?php

declare(strict_types=1);

namespace ContaoPageCookieBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoPageCookieBundle\ContaoPageCookieBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Web ex Machina <https://www.webexmachina.fr>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoPageCookieBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class
                ])
                ->setReplace(['page-cookie']),
        ];
    }
}
