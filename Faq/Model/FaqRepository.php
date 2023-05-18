<?php

namespace Codilar\Faq\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Codilar\Faq\Api\Data\FaqInterface;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Model\ResourceModel\Faq;
use Codilar\Faq\Model\ResourceModel\Faq\CollectionFactory;

/**
 * Class
 * @author Adithya
 */
class FaqRepository implements FaqRepositoryInterface
{

    /**
     * @var faqFactory
     */
    private $faqFactory;

    /**
     * @var Faq
     */
    private $faqResource;

    /**
     * @var FaqCollectionFactory
     */
    private $faqCollectionFactory;
  
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * Class constructor.
     *
     * @param FaqFactory $faqFactory
     * @param Faq $faqResource
     * @param CollectionFactory $faqCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        FaqFactory $faqFactory,
        Faq $faqResource,
        CollectionFactory $faqCollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->faqFactory = $faqFactory;
        $this->faqResource = $faqResource;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     *
     * @param int $id
     * @return \Codilar\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $faq = $this->faqFactory->create(); // creates new instance
        $this->faqResource->load($faq, $id);
        if (!$faq->getId()) {
            throw new NoSuchEntityException(__('Unable to find vendor with ID "%1"', $id));
        }
        return $faq;
    }

    /**
     *
     * @param \Codilar\Faq\Api\Data\FaqInterface $faq
     * @return \Codilar\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(FaqInterface $faq)
    {
        $this->faqResource->save($faq);
        return $faq;
    }

    /**
     *
     * @param \Codilar\Faq\Api\Data\FaqInterface $faq
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(FaqInterface $faq)
    {
        try {
            $this->faqResource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * Retrieve all faq
     *
     * @param int|null $limit
     * @return \Codilar\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getAllFaq($limit = null)
    {
        $collection = $this->faqCollectionFactory->create();

        if ($limit !== null) {
            $collection->setPageSize($limit);
        }
        return $collection->getItems();
    }

    /**
     * @inheritdoc
     */
    public function getNew()
    {
        return $this->faqFactory->create();
    }
}
