<?php

namespace Codilar\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Codilar\Faq\Api\FaqRepositoryInterface;
use Codilar\Faq\Api\Data\FaqInterface;

class MassDelete extends Action
{
    /**
     * @var FaqRepositoryInterface
     */
    private $faqRepository;

    /**
     * MassDelete constructor.
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
     * MassDelete action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected');
        if (empty($ids)) {
            $this->messageManager->addError(__('Please select faq(s) to delete.'));
        } else {
            try {
                foreach ($ids as $id) {
                    $faq = $this->faqRepository->getById($id);
                    $this->faqRepository->delete($faq);
                }
                $this->messageManager->addSuccess(__('Total of %1 fqa(s) have been deleted.', count($ids)));
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(__('We can\'t delete the faq(s) right now. Please review the log and try again.'));
                $this->logger->critical($e);
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/');

        return $resultRedirect;
    }

    /**
     * Check for permissions
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Faq::faqtable_manage');
    }
}
