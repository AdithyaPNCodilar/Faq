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
use Codilar\Faq\Api\FaqRepositoryInterface;

/**
 * Class Faq
 *
 * This class represents a block that handles the display of FAQs.
 */
class Faq extends Template
{
    /**
     * @var FaqRepositoryInterface
     */
    protected $faqRepository;

    /**
     * Faq constructor.
     *
     * @param Template\Context $context
     * @param FaqRepositoryInterface $faqRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        FaqRepositoryInterface $faqRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqRepository = $faqRepository;
    }

    /**
     * Get the FAQ data.
     *
     * @return string
     */
    public function getFaqData()
    {
        $faqCollection = $this->faqRepository->getList();
        return json_encode(
            [
            'items' => $faqCollection->getData(),
            ]
        );
    }
}
