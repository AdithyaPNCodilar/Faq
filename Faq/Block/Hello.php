<?php

/**
 * It extends
 * Magento\Framework\View\Element\Template class
 *
 * @package magento2
 * @author  Adithya P N
 */

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    /**
     * Get the text to be displayed
     *
     * @return string
     */
    public function getText()
    {
        return "Hello Customer";
    }
}
