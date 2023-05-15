<?php
namespace Codilar\Faq\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'pending', 'label' => __('Pending')],
            ['value' => 'approved', 'label' => __('Aprroved')],
            ['value' => 'not approved', 'label' => __('Not Aprroved')],
        ];
    }
}
