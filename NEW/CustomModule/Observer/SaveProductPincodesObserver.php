<?php
namespace Codilar\CustomModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\ResourceConnection;

class SaveProductPincodesObserver implements ObserverInterface
{
    protected $connection;

    public function __construct(ResourceConnection $resource)
    {
        $this->connection = $resource->getConnection();
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $productId = $product->getId();
        $pincodes = $product->getData('assign_pincodes');

        if ($productId && !empty($pincodes) && is_array($pincodes)) {
            $tableName = $this->connection->getTableName('custom_pincodes');
            $insertData = [];

            foreach ($pincodes['dynamic_row'] as $pincode) {
                $insertData[] = [
                    'product_id' => $productId,
                    'pincode' => $pincode['pincodes']
                ];
            }

            if (!empty($insertData)) {
                $this->connection->insertMultiple($tableName, $insertData);
            }
        }
    }
}
