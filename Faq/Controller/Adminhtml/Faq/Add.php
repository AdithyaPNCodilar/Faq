<?php

namespace Codilar\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Add extends Action implements HttpGetActionInterface
{
    // const ADMIN_RESOURCE = 'Vendor_YourModule::your_resource';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor.
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Add new entity action.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        // $resultPage->setActiveMenu('YourVendor_YourModule::your_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Add New FAQ'));

        return $resultPage;
    }
}