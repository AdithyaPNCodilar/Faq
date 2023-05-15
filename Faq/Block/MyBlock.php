<?php

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;
use Codilar\Faq\Model\Source\Status;

class MyBlock extends Template
{
    protected $status;

    public function __construct(
        Template\Context $context,
        Status $status,
        array $data = []
    ) {
        $this->status = $status;
        parent::__construct($context, $data);
    }

    public function getStatusOptions()
    {
        return $this->status->toOptionArray();
    }
}
