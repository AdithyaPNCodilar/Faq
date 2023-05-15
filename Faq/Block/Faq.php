<?php

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;

class Faq extends Template
{
    protected $faqCollection;

    public function __construct(
        Template\Context $context,
        \Codilar\Faq\Model\ResourceModel\Faq\Collection $faqCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqCollection = $faqCollection;
    }

    public function getFaqData()
    {
        $this->faqCollection->addFieldToFilter('status', 'approved'); // Fetch only approved FAQ
        return $this->faqCollection;
        // return json_encode([
        //     'items' => $this->faqCollection->getData(),
        // ]);
    }
}
