<?php

namespace Codilar\CustomTable\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;

class Delete extends Action
{
    /**
     * @var VendorInfoRepositoryInterface
     */
    private $vendorInfoRepository;

    /**
     * Delete constructor.
     *
     * @param Action\Context $context
     * @param VendorInfoRepositoryInterface $vendorInfoRepository
     */
    public function __construct(
        Action\Context $context,
        VendorInfoRepositoryInterface $vendorInfoRepository
    ) {
        parent::__construct($context);
        $this->vendorInfoRepository = $vendorInfoRepository;
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if (!$id) {
            $this->messageManager->addError(__('We can\'t find a vendor to delete.'));
        } else {
            try {
                $this->vendorInfoRepository->deleteById($id);
                $this->messageManager->addSuccess(__('The vendor has been deleted.'));
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(__('We can\'t delete the vendor right now. Please review the log and try again.'));
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
        return $this->_authorization->isAllowed('Codilar_CustomTable::customtable_manage');
    }
}
