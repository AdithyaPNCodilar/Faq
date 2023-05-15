<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Codilar\Faq\Model\ResourceModel\Faq\CollectionFactory;

class Getfaq extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $faqCollectionFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        CollectionFactory $faqCollectionFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $customerId = $this->getRequest()->getParam('customer_id');
        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('customer_id', $customerId)
            ->addFieldToFilter('status', 'approved')
            ->setOrder('created_at', 'desc');

        $faqData = [];
        foreach ($faqCollection as $faq) {
            $faqData[] = [
                'question' => $faq->getQuestion(),
                'answer' => $faq->getAnswer()
            ];
        }

        return $this->resultJsonFactory->create()->setData(['items' => $faqData]);
    }
}
