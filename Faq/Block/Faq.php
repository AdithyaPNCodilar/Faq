<?php

/**
 * File: Faq.php
 *
 * This file contains the implementation of the Faq class.
 * The Faq class represents a block that handles the display of FAQs.
 *
 * @category Codilar
 * @package  Codilar\Faq\Block
 * @author   <adithya.pn@codilar.com>
 */

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Faq
 *
 * This class represents a block that handles the display of FAQs.
 */
class Faq extends Template
{
    /**
     * @var \Codilar\Faq\Model\ResourceModel\Faq\Collection
     */
    protected $faqCollection;

    /**
     * Faq constructor.
     *
     * @param Template\Context $context
     * @param \Codilar\Faq\Model\ResourceModel\Faq\Collection $faqCollection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Codilar\Faq\Model\ResourceModel\Faq\Collection $faqCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqCollection = $faqCollection;
    }

    /**
     * Get the FAQ data.
     *
     * @return string
     */
    public function getFaqData()
    {
        $this->faqCollection->addFieldToFilter('status', 'approved'); // Fetch only approved FAQs
        return json_encode([
            'items' => $this->faqCollection->getData(),
        ]);
    }
}
