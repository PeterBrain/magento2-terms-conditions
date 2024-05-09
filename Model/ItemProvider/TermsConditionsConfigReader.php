<?php
namespace PeterBrain\TermsConditions\Model\ItemProvider;

use Magento\Sitemap\Model\ItemProvider\ConfigReaderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;

/**
 * Class TermsConditionsConfigReader
 * terms-conditions configuration reader
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class TermsConditionsConfigReader implements ConfigReaderInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $_scopeConfig;

    /**
     * @var TermsConditionsHelper
     */
    protected $_termsConditionsHelper;

    /**
     * Constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param TermsConditionsHelper $termsConditionsHelper
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        TermsConditionsHelper $termsConditionsHelper
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    public function getAddToSitemap($storeId): string
    {
        return $this->_termsConditionsHelper->getAddToSitemap($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    public function getPriority($storeId): string
    {
        return $this->_termsConditionsHelper->getPriority($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    public function getChangeFrequency($storeId): string
    {
        return $this->_termsConditionsHelper->getChangeFrequency($storeId);
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    public function getUrl($storeId): string
    {
        return $this->_termsConditionsHelper->getModuleRoute($storeId);
    }
}
