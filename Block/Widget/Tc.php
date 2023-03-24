<?php
namespace PeterBrain\TermsConditions\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\CheckoutAgreements\Model\Agreement;

/**
 * Class Tc
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\TermsConditions\Block\Widget
 */
class Tc extends Template implements BlockInterface
{
    /**
     * @var Agreement
     */
    protected $_agreements;

    /**
     * @var string
     */
    protected $_template = "PeterBrain_TermsConditions::widget/tc.phtml";

    /**
     * Constructor
     *
     * @param Context $context
     * @param Agreement $agreements
     * @param array $data
     */
    public function __construct(
        Context $context,
        Agreement $agreements,
        array $data = []
    ) {
        $this->_agreements = $agreements;
        parent::__construct($context, $data);
    }

    /**
     * Get content of agreement from id
     *
     * @param Agreement $agreementId
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

    /**
     * Get agreement ID from the widget parameter
     *
     * @return string
     */
    public function getAgreementId()
    {
        return $this->getData('agreement_id');
    }
}
