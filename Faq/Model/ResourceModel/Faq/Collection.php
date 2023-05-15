<?php

namespace Codilar\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Faq\Model\Faq;
use Codilar\Faq\Model\ResourceModel\Faq as FaqResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'Codilar_Faq_faq_collection';
    protected $_eventObject = 'faq_collection';

    protected function _construct()
    {
        $this->_init(Faq::class, FaqResourceModel::class);
    }
}
