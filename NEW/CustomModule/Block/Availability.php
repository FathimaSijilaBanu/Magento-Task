<?php
namespace Codilar\CustomModule\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\ResourceConnection;

class Availability extends Template
{
    protected $productRepository;
    protected $connection;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        ResourceConnection $resource,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productRepository = $productRepository;
        $this->connection = $resource->getConnection();
    }

    public function getCurrentProduct()
    {
        $productId = $this->getRequest()->getParam('id');
        if ($productId) {
            try {
                return $this->productRepository->getById($productId);
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }

    public function hasPincodes()
    {
        $product = $this->getCurrentProduct();
        if (!$product) {
            return false;
        }

        $productId = $product->getId();
        $tableName = $this->connection->getTableName('custom_pincodes');
        $select = $this->connection->select()->from($tableName)->where('product_id = ?', $productId);

        $result = $this->connection->fetchAll($select);
        return count($result) > 0;
    }
}
