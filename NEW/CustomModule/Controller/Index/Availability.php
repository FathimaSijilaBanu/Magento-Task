<?php
namespace Codilar\CustomModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Availability extends Action implements HttpPostActionInterface
{
    protected $resultFactory;
    protected $connection;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        ResourceConnection $resource
    ) {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
        $this->connection = $resource->getConnection();
    }

    public function execute()
    {
        $pincode = $this->getRequest()->getParam('pincode');
        var_dump($pincode);
        $tableName = $this->connection->getTableName('custom_pincodes');
        $select = $this->connection->select()->from($tableName)->where('pincode = ?', $pincode);

        $result = $this->connection->fetchRow($select);

        $response = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        if ($result) {
            $response->setData(true);
        } else {
            $response->setData(false);
        }
        return $response;
    }
}
