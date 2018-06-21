<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 21.06.18
 * Time: 18:40
 */

namespace PaulPlentySalePrice;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class PaulPlentySalePrice extends Plugin
{
    /**
     * @param InstallContext $context
     */
    public function install(InstallContext $context)
    {
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_plenty_sale_price.plugin_dir', $this->getPath());
        parent::build($container);
    }
}