<?php
namespace Codilar\CustomTable\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;

class Index extends Action
{
    protected $resultPageFactory;
    protected $vendorInfoRepository;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        VendorInfoRepositoryInterface $vendorInfoRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->vendorInfoRepository = $vendorInfoRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $isEnabled = $this->_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')
            ->getValue('vendor_info/general/enabled');
        $pageSize = $this->_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')
            ->getValue('vendor_info/general/records_to_display');
        $vendorInfoCollection = $this->vendorInfoRepository->getList();
        $resultPage = $this->resultPageFactory->create();

        if ($isEnabled) {
            $vendorInfoCollection->setPageSize($pageSize);
            $resultPage->getConfig()->getTitle()->set(__('Vendors'));
            $block = $resultPage->getLayout()->getBlock('customtable.vendorinfo');
            $block->setData('vendor_info_collection', $vendorInfoCollection);
            $block->setData('page_size', $pageSize);
        } else {
            $resultPage->getConfig()->getTitle()->set(__('Vendors are currently disabled'));
            $resultPage->getLayout()->unsetElement('customtable.vendorinfo');
        }

        return $resultPage;
    }
}
