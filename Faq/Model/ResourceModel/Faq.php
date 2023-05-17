<?php

namespace Codilar\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Faq
 * @package Codilar\Faq\Model\ResourceModel
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
