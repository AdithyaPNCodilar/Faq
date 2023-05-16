<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Codilar\Faq\Model\ResourceModel\Faq\CollectionFactory;

class Getfaq extends Action
{
    protected $jsonFactory;
    protected $faqCollectionFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CollectionFactory $faqCollectionFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function execute()
    {
        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('status', 'approved'); // Filter by status = 'approved'
        $faqs = $faqCollection->getData();

        return $this->jsonFactory->create()->setData($faqs);
    }
}
