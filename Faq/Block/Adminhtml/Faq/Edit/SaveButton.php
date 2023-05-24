<?php

/**
 *
 * @package Codilar_Faq
 *
 */

namespace Codilar\Faq\Block\Adminhtml\Faq\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * It extends the GenericButton class
 */

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieves button data.
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save FAQ'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
