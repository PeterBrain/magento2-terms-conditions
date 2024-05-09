<?php
namespace PeterBrain\TermsConditions\Block\Adminhtml\System\Config\Module;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;

/**
 * Class Status
 * module status information
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class Status extends Field
{
    /**
     * @var TermsConditionsHelper
     */
    private $_termsConditionsHelper;

    /**
     * Constructor
     *
     * @param Context $context
     * @param TermsConditionsHelper $termsConditionsHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        TermsConditionsHelper $termsConditionsHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $module_enabled = $this->_termsConditionsHelper->getConfigGeneral('enable');
        $agreements_enabled = $this->_termsConditionsHelper->getConfigValue('checkout/options/enable_agreements');

        $status;
        $symbol_color;
        if ($module_enabled) {
            $symbol_color = '#0d3';
            $status = __('Ready for operation');
        } else {
            $symbol_color = '#f00';
            $status = __('Module output is disabled');
        }

        if (!$agreements_enabled) {
            $config_url = sprintf(
                '<a href="%s">%s</a>',
                $this->_urlBuilder->getUrl('adminhtml/system_config/edit/section/checkout'),
                __('Sales > Checkout > Checkout Options > Enable Terms and Conditions')
            );
            if ($module_enabled) {
                $symbol_color = '#fd1';
            }
            $status .= '<br>' .
                __('Attention - Terms and conditions are disabled.') .
                ' ' . __('Check %1', $config_url);
        }

        $symbol = '<span
            style="
                color:' . $symbol_color . ';
                font-size: 3em;
                font-family: Arial;
                vertical-align: middle;
                display: inline-block;
                line-height: 1rem;
                text-shadow:
                    0px 0px 1px #ccc,
                    0px 0px 1px #ccc,
                    0px 0px 1px #ccc,
                    0px 0px 1px #ccc;
            ">&#8226;</span>';
        return $symbol . '&nbsp;' . $status;
    }
}
