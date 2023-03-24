<?php
namespace PeterBrain\TermsConditions\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class TermsConditionsHelper
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\TermsConditions\Helper
 */
class TermsConditionsHelper extends AbstractHelper
{
    const CONFIG_MODULE_PATH = 'pb_termsconditions';

    /**
     * @param string $code
     * @param null $storeId
     *
     * @return mixed
     */
    public function getConfigGeneral($code = '', $storeId = null)
    {
        $code = ($code !== '') ? '/' . $code : '';

        return $this->getConfigValue(static::CONFIG_MODULE_PATH . '/general' . $code, $storeId);
    }

    /**
     * @param string $code
     * @param null $storeId
     *
     * @return mixed
     */
    public function getConfigSitemap($code = '', $storeId = null)
    {
        $code = ($code !== '') ? '/' . $code : '';

        return $this->getConfigValue(static::CONFIG_MODULE_PATH . '/sitemap' . $code, $storeId);
    }

    /**
     * @param string $configPath
     * @param null $storeId
     *
     * @return string
     */
    public function getConfigValue(string $configPath, $storeId = null): string
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param null $storeId
     *
     * @return string
     */
    public function isEnabled($storeId = null): string
    {
        return $this->getConfigGeneral('enable', $storeId);
    }

    /**
     * Get custom module frontend route
     *
     * @param null $storeId
     *
     * @return string
     */
    public function getModuleRoute($storeId = null): string
    {
        return $this->getConfigGeneral('route', $storeId);
    }

    /**
     * Get frontend page title
     *
     * @param null $storeId
     *
     * @return string|null
     */
    public function getPageTitle($storeId = null): ?string
    {
        return $this->getConfigGeneral('page_title', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return string
     */
    public function getAddToSitemap($storeId = null): string
    {
        return $this->getConfigSitemap('add_to_sitemap', $storeId);
    }

    /**
     * Get sitemap priority
     *
     * @param null $storeId
     *
     * @return string
     */
    public function getPriority($storeId = null): string
    {
        return $this->getConfigSitemap('priority', $storeId) ?: '0.5';
    }

    /**
     * Get sitemap change frequency
     *
     * @param null $storeId
     *
     * @return string
     */
    public function getChangeFrequency($storeId = null): string
    {
        return $this->getConfigSitemap('change_frequency', $storeId) ?: 'monthly';
    }
}
