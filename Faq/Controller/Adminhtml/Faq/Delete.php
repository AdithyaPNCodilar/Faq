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
        $resultRedirect = $this->resultRedirectFactory->create();

        try {
            if ($id) {
                $faq = $this->faqRepository->getById($id);
                $this->faqRepository->delete($faq);
                $this->messageManager->addSuccess(
                    __('Entity has been deleted.')
                );
                return $resultRedirect->setPath('*/*/');
            } else {
                $this->messageManager->addError(
                    __('We can\'t find the entity to delete.')
                );
            }
        } catch (NoSuchEntityException $e) {
            $this->messageManager->addError(
                __('We can\'t find the entity to delete.')
            );
        } catch (CouldNotDeleteException $e) {
            $this->messageManager->addError($e->getMessage());
            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        } catch (LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/');
    }
}
