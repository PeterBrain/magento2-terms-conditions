<?php
namespace PeterBrain\TermsConditions\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\CheckoutAgreements\Model\Agreement;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;

/**
 * Class Tc
 * agreement widget
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class Tc extends Template implements BlockInterface
{
    /**
     * @var Agreement
     */
    protected $_agreements;

    /**
     * @var TermsConditionsHelper
     */
    private $_termsConditionsHelper;

    /**
     * @var string
     */
    protected $_template = "PeterBrain_TermsConditions::widget/tc.phtml";

    /**
     * Constructor
     *
     * @param Context $context
     * @param Agreement $agreements
     * @param TermsConditionsHelper $termsConditionsHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Agreement $agreements,
        TermsConditionsHelper $termsConditionsHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_agreements = $agreements;
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * Check whether module output is enabled or not
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->_termsConditionsHelper->isEnabled();
    }

    /**
     * Get agreement ID from the widget parameter
     *
     * @return void
     */
    public function getAgreementId()
    {
        return $this->getData('agreement_id');
    }

    /**
     * Check whether agreement is html or not
     *
     * @param $agreementId
     *
     * @return boolean
     */
    public function agreementIsHtml($agreementId): bool
    {
        return $this->_agreements->load($agreementId)->getIsHtml() ?: false;
    }

    /**
     * Get content of agreement from id
     *
     * @param $agreementId
     *
     * @return void
     */
    public function getAgreementById($agreementId)
    {
        $agree = $this->_agreements->load($agreementId);

        if ($agree->getIsActive()) {
            $result = $agree->getContent();
        } else {
            $result = __("Sorry, but we are unable find any terms and conditions with this id.");
        }

        return $result;
    }
}
