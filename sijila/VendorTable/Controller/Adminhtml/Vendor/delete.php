<?php

namespace Codilar\VendorTable\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Codilar\VendorTable\Model\VendorFactory;
use Magento\Framework\Exception\LocalizedException;

class Delete extends Action
{
    /**
     * @var VendorFactory
     */
    private $vendorFactory;

    /**
     * DeleteController constructor.
     *
     * @param Action\Context $context
     * @param VendorFactory $vendorFactory
     */
    public function __construct(
        Action\Context $context,
        VendorFactory $vendorFactory
    ) {
        parent::__construct($context);
        $this->vendorFactory = $vendorFactory;
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
                $model = $this->vendorFactory->create();
                $model->load($id);
                $model->delete();
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
        return $this->_authorization->isAllowed('Codilar_VendorTable::vendortable_manage');
    }
}
