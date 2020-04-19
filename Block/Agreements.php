<?php

namespace PeterBrain\ProductAttributes\Block;

class Agreements extends \Magento\Framework\View\Element\Template
{
  protected $_agreements;

  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\CheckoutAgreements\Model\Agreement $agreements
  )
  {
    $this->_agreements = $agreements;
    parent::__construct($context);
  }

  public function getAgreements($agreementId)
  {
    $agree = $this->_agreements->load($agreementId);
    return $agree->getContent();
  }
}
