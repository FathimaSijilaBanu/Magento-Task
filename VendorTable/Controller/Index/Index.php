<?php

namespace Codilar\VendorTable\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\VendorTable\Model\ResourceModel\Vendor\CollectionFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_collectionFactory;
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_collectionFactory = $collectionFactory;
       
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_collectionFactory->create();
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('VENDOR LIST'));
        $block = $resultPage->getLayout()->getBlock('my_module_block');
        return $resultPage;
    }
}
