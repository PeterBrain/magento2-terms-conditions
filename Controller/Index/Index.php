<?php
namespace PeterBrain\TermsConditions\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use PeterBrain\TermsConditions\Helper\TermsConditionsHelper;

/**
 * Class Index
 *
 * @author PeterBrain <peter.loecker@live.at>
 * @copyright Copyright (c) PeterBrain (https://peterbrain.com/)
 * @package PeterBrain\TermsConditions\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param TermsConditionsHelper $termsConditionsHelper
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        TermsConditionsHelper $termsConditionsHelper
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_termsConditionsHelper = $termsConditionsHelper;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->resultPage = $this->resultPageFactory->create();
		$this->resultPage->getConfig()->getTitle()->set($this->_termsConditionsHelper->getPageTitle());
        return $this->resultPage;
    }
}
