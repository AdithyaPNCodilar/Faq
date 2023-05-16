<?php

namespace Codilar\Faq\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;

class FaqForm extends Template
{
    protected $customerSession;

    public function __construct(
        Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        // Session $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
    }

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
