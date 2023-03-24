<?php
namespace PeterBrain\TermsConditions\Model\ItemProvider;

use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sitemap\Model\ItemProvider\ItemProviderInterface;
use Magento\Sitemap\Model\SitemapItemFactory;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;
use PeterBrain\TermsConditions\Model\ItemProvider\TermsConditionsConfigReader;

/**
 * Class TermsConditions
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\TermsConditions\Model\ItemProvider
 */
class TermsConditions implements ItemProviderInterface
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var TermsConditionsConfigReader
     */
    private $_configReader;

    /**
     * @var SitemapItemFactory
     */
    private $_itemFactory;

    /**
     * @var TermsConditionsHelper
     */
    protected $_termsConditionsHelper;

    /**
     * @var array
     */
    protected $sitemapItems = [];

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     * @param TermsConditionsConfigReader $configReader
     * @param SitemapItemFactory $itemFactory
     * @param TermsConditionsHelper $termsConditionsHelper
     */
    public function __construct(
        LoggerInterface $logger,
        TermsConditionsConfigReader $configReader,
        SitemapItemFactory $itemFactory,
        TermsConditionsHelper $termsConditionsHelper
    ) {
        $this->_logger = $logger;
        $this->_configReader = $configReader;
        $this->_itemFactory = $itemFactory;
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * @param int $storeId
     *
     * @return array
     *
     * @throws NoSuchEntityException
     */
    public function getItems($storeId): array
    {
        /*$this->_logger->debug($this->getAddToSitemap($storeId));*/

        if ($this->_termsConditionsHelper->isEnabled() && $this->getAddToSitemap($storeId)) {
            $this->sitemapItems[] = $this->_itemFactory->create(
                [
                    'url' => $this->getUrl($storeId),
                    'updatedAt' => date('Y-m-d h:i:s'),
                    'priority' => $this->getPriority($storeId),
                    'changeFrequency' => $this->getChangeFrequency($storeId),
                ]
            );
        }

        return $this->sitemapItems;
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    private function getAddToSitemap(int $storeId): string
    {
        return $this->_configReader->getAddToSitemap($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    private function getUrl(int $storeId): string
    {
        return $this->_configReader->getUrl($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    private function getPriority(int $storeId): string
    {
        return $this->_configReader->getPriority($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    private function getChangeFrequency(int $storeId): string
    {
        return $this->_configReader->getChangeFrequency($storeId);
    }
}
