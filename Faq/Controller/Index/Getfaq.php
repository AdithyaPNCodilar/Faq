<?php

namespace Codilar\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Codilar\Faq\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;

/**
 * Class Getfaq
 *
 * This class represents a controller action for retrieving FAQs.
 *
 */

class Getfaq extends Action implements HttpPostActionInterface
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
     * @var \Magento\Catalog\Model\ProductRepository
     */
    protected $productRepository;

    /**
     * Getfaq constructor.
     *
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param CollectionFactory $faqCollectionFactory
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CollectionFactory $faqCollectionFactory,
        \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the controller action retrieve the FAQs for the specified product ID.
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $productId = (int)$this->getRequest()->getParam('product_id');

        try {
            $product = $this->productRepository->getById($productId);
        } catch (\Exception $e) {
            return $this->jsonFactory->create()->setData([]);
        }

        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('status', 'approved');
        $faqCollection->addFieldToFilter('product_id', $product->getId());
        $faqs = $faqCollection->getData();

        return $this->jsonFactory->create()->setData($faqs);
    }
}
