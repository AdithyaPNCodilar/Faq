<?php

namespace Codilar\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Faq
 * This class represents the resource model for the FAQ entity
 * It extends the AbstractDb class
 */

class Faq extends AbstractDb
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('faq_table', 'id');
    }
}
