<?php

namespace PaulPlentySalePrice\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Frontend implements SubscriberInterface
{

    /** @var  ContainerInterface */
    private $container;

    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Modules_Basket_getPriceForUpdateArticle_FilterPrice' => 'onFilterPrice',
            'Enlight_Controller_Action_PreDispatch_Frontend_Detail' => 'onPreDispatchDetail',
        ];
    }


    public function onPreDispatchDetail(\Enlight_Event_EventArgs $args)
    {

        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_raiting_overview.plugin_dir') . '/Resources/Views');
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulRaitingOverview');

        // Lese Plugineinstellungen
        $active = $config['active'];

    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFilterPrice(\Enlight_Event_EventArgs $args)
    {

        if ($this->checkIfSaleIsValid()) {
            $price = $args->getReturn();
            $price['price'] = $price['price'] * 1;
            $args->setReturn($price);
        }
    }

    private function checkIfSaleIsValid()
    {

        $bekommtRabatt = false;

        if (true) {
            $bekommtRabatt = true;
        }

        return $bekommtRabatt;
    }
}