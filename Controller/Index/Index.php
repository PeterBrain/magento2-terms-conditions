<?php
namespace PeterBrain\TermsConditions\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;
use Magento\CheckoutAgreements\Block\Agreements as AgreementsBlock;

/**
 * Class Index
 * terms-conditions controller
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var AgreementsBlock
     */
    protected $_agreementsBlock;

    /**
     * @var TermsConditionsHelper
     */
    protected $_termsConditionsHelper;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AgreementsBlock $agreementsBlock
     * @param TermsConditionsHelper $termsConditionsHelper
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AgreementsBlock $agreementsBlock,
        TermsConditionsHelper $termsConditionsHelper
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_agreementsBlock = $agreementsBlock;
        $this->_termsConditionsHelper = $termsConditionsHelper;
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        if (!$this->_termsConditionsHelper->isEnabled()) {
            $this->_forward('noroute');
            return;
        }

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set($this->_termsConditionsHelper->getPageTitle());

        $agreements = $this->_agreementsBlock->getAgreements();
        $resultPage->getLayout()->getBlock('terms_conditions')->setData('agreements', $agreements);

        return $resultPage;
    }
}
