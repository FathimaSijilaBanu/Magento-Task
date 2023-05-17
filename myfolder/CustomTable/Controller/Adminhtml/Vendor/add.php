<?php

namespace Codilar\CustomTable\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;
use Codilar\CustomTable\Api\Data\VendorInfoInterfaceFactory;
use Magento\Framework\Exception\LocalizedException;

class Add extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var VendorInfoRepositoryInterface
     */
    protected $vendorInfoRepository;

    /**
     * @var VendorInfoInterfaceFactory
     */
    protected $vendorInfoFactory;

    /**
     * Constructor.
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param VendorInfoRepositoryInterface $vendorInfoRepository
     * @param VendorInfoInterfaceFactory $vendorInfoFactory
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        VendorInfoRepositoryInterface $vendorInfoRepository,
        VendorInfoInterfaceFactory $vendorInfoFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->vendorInfoRepository = $vendorInfoRepository;
        $this->vendorInfoFactory = $vendorInfoFactory;
    }

    /**
     * Add new entity action.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Vendor'));

        try {
            $vendorInfo = $this->vendorInfoFactory->create();
            $vendorInfo->setData([]);
            $this->vendorInfoRepository->save($vendorInfo);
        } catch (LocalizedException $e) {
            $this->messageManager->addError(__('An error occurred while creating the vendor.'));
            $this->_redirect('*/*/index');
            return;
        }

        return $resultPage;
    }
}
