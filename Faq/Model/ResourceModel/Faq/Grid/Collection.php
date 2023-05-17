<?php

namespace Codilar\Faq\Model\ResourceModel\Faq\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Faq\Model\Faq;
use Codilar\Faq\Model\ResourceModel\Faq as FaqResourceModel;

/**
 * Class Collection
 * @package Codilar\Faq\Model\ResourceModel\Faq\Grid
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model and primary key
     */
    protected $_idFieldName = 'id';

    /**
     * Event prefix
     */
    protected $_eventPrefix = 'Codilar_Faq_faq_collection';

    /**
     * Event object
     */
    protected $_eventObject = 'faq_collection';

    /**
     * Initialize collection
     */
    protected function _construct()
    {
        $this->_init(Faq::class, FaqResourceModel::class);
    }
}
