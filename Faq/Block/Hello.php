<?php
/**
 *
 * @package     magento2
 * @author      Adithya P N
 */

namespace Codilar\Faq\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    public function getText() {
        return "Hello Customer";
    }
}