<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Codilar\Faq\Model\FaqFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;

/**
 * Class Submit
 *
 * This class represents a controller action for submitting an FAQ question.
 *
 */
class Submit extends Action implements HttpPostActionInterface
{
    /**
     * @var FaqFactory
     */
    protected $_faqFactory;

    /**
     * @var \Magento\Framework\Controller\Result\Redirect
     */
    protected $resultRedirect;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Submit constructor.
     *
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param \Magento\Framework\Controller\Result\Redirect $resultRedirect
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        FaqFactory $faqFactory,
        \Magento\Framework\Controller\Result\Redirect $resultRedirect,
        Session $customerSession
    ) {
        parent::__construct($context);
        $this->_faqFactory = $faqFactory;
        $this->resultRedirect = $resultRedirect;
        $this->customerSession = $customerSession;
    }

    /**
     * Execute the controller action and save the submitted FAQ question.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();
        $faq = $this->_faqFactory->create();
        $faq->setQuestion($postData['question']);
        $faq->setStatus($postData['status']);

        // Set the product_id and customer_id
        $faq->setData('product_id', $postData['product_id']);
        $faq->setData('customer_id', $this->customerSession->getCustomerId());

        $faq->save();
        $this->messageManager->addSuccess(
            __('FAQ question submitted successfully!')
        );
        return $this->resultRedirectFactory->create()->setUrl(
            $this->_redirect->getRefererUrl()
        );
    }
}
