<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Api\Data\FaqInterfaceFactory;
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
     * @var FaqRepositoryInterface
     */
    protected $faqRepository;

    /**
     * @var FaqInterfaceFactory
     */
    protected $faqFactory;

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
     * @param FaqRepositoryInterface $faqRepository
     * @param FaqInterfaceFactory $faqFactory
     * @param \Magento\Framework\Controller\Result\Redirect $resultRedirect
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        FaqRepositoryInterface $faqRepository,
        FaqInterfaceFactory $faqFactory,
        \Magento\Framework\Controller\Result\Redirect $resultRedirect,
        Session $customerSession
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqRepository;
        $this->faqFactory = $faqFactory;
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
        $faqData = [
            'question' => $postData['question'],
            'status' => $postData['status'],
            'product_id' => $postData['product_id'],
            'customer_id' => $this->customerSession->getCustomerId()
        ];

        try {
            $faq = $this->faqFactory->create();
            $faq->setData($faqData);
            $this->faqRepository->save($faq);
            $this->messageManager->addSuccess(__('FAQ question submitted successfully!'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('An error occurred while submitting the FAQ question.'));
        }

        return $this->resultRedirectFactory->create()->setUrl($this->_redirect->getRefererUrl());
    }
}
