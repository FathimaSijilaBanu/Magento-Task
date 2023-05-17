<?php

namespace Codilar\HelloWorld\Plugin;

class ProductPlugin
{
    public function afterGetName(\Magento\Catalog\Model\Product $product, $result)
    {
        return "Product: " . $result;
    }
}
