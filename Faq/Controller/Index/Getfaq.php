<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Codilar\Faq\Model\ResourceModel\Faq\CollectionFactory;

/**
 * Class Getfaq
 *
 * This class represents a controller action for retrieving FAQs.
 *
 * @package Codilar\Faq\Controller\Index
 */

class Getfaq extends Action
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var CollectionFactory
     */
    protected $faqCollectionFactory;

    /**
     * Getfaq constructor.
     *
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param CollectionFactory $faqCollectionFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CollectionFactory $faqCollectionFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    /**
     * Execute the controller action and retrieve the FAQs.
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('status', 'approved'); // Filter by status = 'approved'
        $faqs = $faqCollection->getData();

        return $this->jsonFactory->create()->setData($faqs);
    }
}
