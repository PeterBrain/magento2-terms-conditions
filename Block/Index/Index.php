<?php

declare(strict_types=1);

namespace PeterBrain\TermsConditions\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_agreements;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\CheckoutAgreements\Model\Agreement $agreements,
        array $data = []
    ) {
        $this->_agreements = $agreements;
        parent::__construct($context, $data);
    }

    public function getAgreementById($agreementId)
    {
        $agree = $this->_agreements->load($agreementId);
        return $agree->getContent();
    }
}

