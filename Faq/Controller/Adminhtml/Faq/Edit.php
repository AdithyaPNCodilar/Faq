<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Codilar\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Api\Data\FaqInterface;

class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Codilar_Faq::entity';

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var FaqRepositoryInterface
     */
    private $faqRepository;


    /**
     * @var \Codilar\Faq\Model\FaqFactory
     */
    private $faqFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Codilar\Faq\Model\FaqFactory $faqFactory
     * @param FaqRepositoryInterface $faqRepository
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Codilar\Faq\Model\FaqFactory $faqFactory,
        FaqRepositoryInterface $faqRepository
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->faqFactory = $faqFactory;
        $this->faqRepository = $faqRepository;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParams('id');
        
        $model = $this->faqFactory->create();

        if ($id) {
           
            if (!$faq = $this->faqRepository->getById($id)) {
                $this->messageManager->addError(__('This entity no longer exists.'));
                return $this->_redirect('*/*/');
            }
        }

        $this->coreRegistry->register('faq_data', $model);

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Codilar_Faq::faq_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Answering Page'));

        return $resultPage;
    }
}
