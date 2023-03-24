<?php
namespace PeterBrain\TermsConditions\Controller;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Url;
use Magento\Framework\Event\ManagerInterface as EventManagerInterface;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper as CustomRouteHelper;

/**
 * Class Router
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\TermsConditions\Controller
 */
class Router implements RouterInterface
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var ActionFactory
     */
    protected $_actionFactory;

    /**
     * @var EventManagerInterface
     */
    protected $_eventManager;

    /**
     * @var CustomRouteHelper
     */
    protected $_termsConditionsHelper;

    /**
     * @var bool
     */
    private $dispatched = false;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     * @param ActionFactory $actionFactory
     * @param EventManagerInterface $eventManager
     * @param CustomRouteHelper $termsConditionsHelper
     */
    public function __construct(
        LoggerInterface $logger,
        ActionFactory $actionFactory,
        EventManagerInterface $eventManager,
        CustomRouteHelper $termsConditionsHelper
    ) {
        $this->_logger = $logger;
        $this->_actionFactory = $actionFactory;
        $this->_eventManager = $eventManager;
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        if (!$this->dispatched) {
            $identifier = trim($request->getPathInfo(), '/');

            $this->_eventManager->dispatch('core_controller_router_match_before', [
                'router' => $this,
                'condition' => new DataObject(['identifier' => $identifier, 'continue' => true])
            ]);

            $route = $this->_termsConditionsHelper->getModuleRoute();
            /*$this->_logger->debug($route);*/

            if ($route !== '' && $identifier === $route) {
                $request->setModuleName('termsconditions')->setControllerName('index')->setActionName('index');
                $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
                $this->dispatched = true;

                return $this->_actionFactory->create(
                    'Magento\Framework\App\Action\Forward',
                    ['request' => $request]
                );
            }

            return null;
        }
    }
}
