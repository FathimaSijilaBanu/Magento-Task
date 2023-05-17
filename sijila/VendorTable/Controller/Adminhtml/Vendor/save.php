<?php
/** 
 * @package   Vendor_Modulename
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */

namespace Codilar\VendorTable\Controller\Adminhtml\Vendor;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Codilar\VendorTable\Model\VendorFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Codilar_VendorTable::entity';

    /**
     * @var VendorFactory
     */
    protected $_entityFactory;
    
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var SessionManagerInterface
     */
    protected $_sessionManager;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Codilar\VendorTable\Model\VendorFactory $entityFactory
     * @param \Magento\Framework\Session\SessionManagerInterface $sessionManager
     */
    public function __construct(
        Context $context,
        VendorFactory $entityFactory,
        PageFactory $resultPageFactory,
        SessionManagerInterface $sessionManager
    )
    {
        parent::__construct($context);
        $this->_entityFactory = $entityFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
    }
    
    /**
     * Save action
     */
    public function execute()
    {   
        $resultRedirect = $this->resultRedirectFactory->create();
        $entityModel = $this->_entityFactory->create();
        $data = $this->getRequest()->getPost(); 
        
        try {
            if (!empty($data['id'])) {
                $entityModel->load($data['id']);
            }
            
            $entityModel->setData('name', $data['name']);
            $entityModel->setData('description', $data['description']);
            $entityModel->setData('mobile', $data['mobile']);
            $entityModel->save();
            $entityModel->load($data['name']);
            
            //check for `back` parameter
            if ($this->getRequest()->getParam('back')) { 
                return $resultRedirect->setPath('*/*/edit', ['id' => $entityModel->getId(), '_current' => true, '_use_rewrite' => true]);
            }

            $this->messageManager->addSuccess(__('The Entity has been saved.'));

        } catch(\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        
        return $resultRedirect->setPath('*/*/');
    }
}
