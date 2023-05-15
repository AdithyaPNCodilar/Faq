<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Codilar\Faq\Model\FaqFactory;

class Submit extends \Magento\Framework\App\Action\Action
{
    protected $_faqFactory;
    protected $resultRedirect;
 
    public function __construct(
        Context $context, 
        FaqFactory $faqFactory, 
        \Magento\Framework\Controller\Result\Redirect $resultRedirect
    ) {
        parent::__construct($context);
        $this->_faqFactory = $faqFactory;
        $this->resultRedirect = $resultRedirect;
    }
    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();
        $faq = $this->_faqFactory->create();
        $faq->setQuestion($postData['question']);
        $faq->setStatus($postData['status']);
        
        // set the product_id and customer_id
        $faq->setData('product_id', $postData['product_id']);
        $faq->setData('customer_id', $postData['customer_id']);

        $faq->save();
        $this->messageManager->addSuccess(__('FAQ question submitted successfully!'));
        return $this->resultRedirectFactory->create()->setUrl($this->_redirect->getRefererUrl());
    }
  
}
