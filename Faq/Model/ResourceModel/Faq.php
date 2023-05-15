<?php
namespace Codilar\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Faq extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('faq_table', 'id');
    }
}
