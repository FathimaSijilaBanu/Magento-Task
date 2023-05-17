<?php

namespace Codilar\ProductItem\Block;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\View\Element\Template;

class Product extends Template
{
    protected $_categoryFactory;
    protected $_productFactory;

    public function __construct(
        Template\Context $context,
        CategoryFactory $categoryFactory,
        ProductFactory $productFactory,
        array $data = []
    ) {
        $this->_categoryFactory = $categoryFactory;
        $this->_productFactory = $productFactory;
        parent::__construct($context, $data);
    }

    public function getCategoryProducts($categoryId)
{
    $category = $this->_categoryFactory->create()->load($categoryId);
    $productCollection = $this->_productFactory->create()->getCollection()
        ->addAttributeToSelect('*')
        ->addCategoryFilter($category)
        ->addMediaGalleryData()
        ->load();

    return $productCollection;
}

}
