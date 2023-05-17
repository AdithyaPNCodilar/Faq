<?php

/**
 * File: FaqForm.php
 *
 * This file contains the implementation of the FaqForm class.
 * The FaqForm class represents a FAQ form block extending the Template class.
 * It provides functionality related to the display and handling of a FAQ form.
 *
 * @category Codilar
 * @package  Codilar\Faq\Block
 * @author   <adithya.pn@codilar.com>
 * @license  MIT License
 * @link     https://example.com
 */

namespace Codilar\Faq\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;

/**
 * Class FaqForm
 *
 * This class represents a FAQ form block extending the Template class.
 * It provides functionality related to the display and handling of a FAQ form.
 */
class FaqForm extends Template
{
    /**
     * Customer session instance.
     *
     * @var Session
     */
    protected $customerSession;
    /**
     * FaqForm constructor.
     *
     * @param Template\Context $context
     * @param Session $customerSession
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        // Session $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
    }
    /**
     * Get the customer ID.
     *
     * @return int|null
     */
    public function getCustomerId()
    {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getCustomerId();
        }

        return null;
    }
    /**
     * Get Faq product id
     *
     * @return int
     */
    public function getProductId()
    {
        return (int)$this->getRequest()->getParam('product_id', false);
    }
}
