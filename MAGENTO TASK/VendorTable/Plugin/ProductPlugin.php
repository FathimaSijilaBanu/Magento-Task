<?php

namespace Codilar\VendorTable\Plugin;

class ProductPlugin
{
    public function afterGetName(\Magento\Catalog\Model\Product $product, $result)
    {
        return "Product: " . $result;
    }

    // public function beforeGetPrice(\Magento\Catalog\Model\Product $product)
    // {
    //     $originalPrice = $product->getPrice();
    //     $discountedPrice = $originalPrice - ($originalPrice * 0.1); 
    //     $product->setPrice($discountedPrice);
    // }
}


