<?php
namespace Codilar\VendorTable\Block\Product;

class View extends \Magento\Catalog\Block\Product\View
{
    /**
     * Get the custom product string.
     *
     * @return string
     */
   

    /**
     * Get the current product.
     *
     * @return \Magento\Catalog\Api\Data\ProductInterface|null
     */
    public function getProduct()
{
    $product = parent::getProduct();
    $product->setCustomString($this->getCustomProductString());
    $customData = $product->getResource()->getAttribute('custom_datapatch')->getFrontend()->getValue($product);
    $product->setData('custom_datapatch', $customData);
    return $product;
}
}
