<?php

namespace Codilar\Faq\Controller\Adminhtml\Faq;

use Codilar\Faq\Api\Data\FaqInterface;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Model\CouldNotDeleteException;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Delete extends Action implements HttpGetActionInterface
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
    private $faqRepository;

    /**
     * Delete constructor.
     *
     * @param Action\Context $context
     * @param FaqRepositoryInterface $faqRepository
     */
    public function __construct(
        Action\Context $context,
        FaqRepositoryInterface $faqRepository
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqRepository;
    }

    /**
     * Delete action
     *
     * @return Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        /** 
         * @var Redirect $resultRedirect 
         * */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $faq = $this->faqRepository->getById($id);
                $this->faqRepository->delete($faq);
                // display success message
                $this->messageManager->addSuccess(__('Entity has been deleted.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (NoSuchEntityException $e) {
                // display error message
                $this->messageManager->addError(
                    __(
                        'We can\'t find the entity to delete.'
                    )
                );
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (CouldNotDeleteException $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            } catch (LocalizedException $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go to grid
                return $resultRedirect->setPath('*/*/');
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find the entity to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
