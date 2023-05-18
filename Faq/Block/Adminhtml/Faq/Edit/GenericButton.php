<?php

/**
 * @package Codilar_Faq
 *
 */

namespace Codilar\Faq\Block\Adminhtml\Faq\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

/**
 * Class GenericButton
 * GenericButton class represents a generic button used in various contexts.
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * The Url Builder class is responsible for building URLs in Magento
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * The Registry class provides a way to store and retrieve
     * data globally during a single request.
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->context = $context;
        $this->urlBuilder = $this->context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Return the synonyms group Id.
     *
     * @return int|null
     */
    public function getId()
    {
        $entityId = null;
        $entityId =  $this->context->getRequest()->getParam('id');
        
        return $entityId;
    }

    /**
     * Generate url by route and parameters
     *
     * @param  string $route
     * @param  array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
