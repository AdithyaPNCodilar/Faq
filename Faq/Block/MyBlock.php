<?php

/**
 * File: MyBlock.php
 *
 * This file contains the implementation of the MyBlock class.
 * The MyBlock class represents a custom block extending the Template class.
 * It provides functionality related to the status options.
 *
 * @category Codilar
 * @package  Codilar\Faq\Block
 * @author   <adithya.pn@codilar.com>
 */

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;
use Codilar\Faq\Model\Source\Status;

/**
 * Class MyBlock
 *
 * This class represents a custom block extending the Template class.
 * It provides functionality related to the status options.
 */
class MyBlock extends Template
{
    /**
     * @var Status
     */
    protected $status;

    /**
     * MyBlock constructor.
     *
     * @param Template\Context $context
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Status $status,
        array $data = []
    ) {
        $this->status = $status;
        parent::__construct($context, $data);
    }

    /**
     * Get the status options.
     *
     * @return array
     */
    public function getStatusOptions()
    {
        return $this->status->toOptionArray();
    }
}
