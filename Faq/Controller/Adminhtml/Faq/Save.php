<?php

namespace Codilar\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Controller\ResultFactory;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Api\Data\FaqInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends Action implements HttpPostActionInterface
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'Codilar_Faq::entity';

    /**
     * @var FaqRepositoryInterface
     */
    protected $faqRepository;
    
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var SessionManagerInterface
     */
    protected $sessionManager;

    /**
     * @param Context $context
     * @param FaqRepositoryInterface $faqRepository
     * @param PageFactory $resultPageFactory
     * @param SessionManagerInterface $sessionManager
     */
    public function __construct(
        Context $context,
        FaqRepositoryInterface $faqRepository,
        PageFactory $resultPageFactory,
        SessionManagerInterface $sessionManager
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->sessionManager = $sessionManager;
    }
    
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $faq = $this->faqRepository->getNew();
        
        //retrieves the data submitted by the user in the form of an associative array
        $data = $this->getRequest()->getPost();
        
        try {
            if (!empty($data['id'])) {
                $faq = $this->faqRepository->getById($data['id']);
            }
            $faq->setProductId($data['product_id']);
            $faq->setCustomerId($data['customer_id']);
            $faq->setQuestion($data['question']);
            $faq->setAnswer($data['answer']);
            $faq->setStatus($data['status']);
            $this->faqRepository->save($faq);
            
            //check for `back` parameter
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $faq->getId(), '_current' => true, '_use_rewrite' => true]);
            }

            $this->messageManager->addSuccess(__('The FAQ has been saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        
        return $resultRedirect->setPath('*/*/');
    }
}
