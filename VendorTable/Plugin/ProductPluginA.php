<?php

namespace Codilar\VendorTable\Plugin;

class ProductPluginA
{

    public function aroundGetPrice(\Magento\Catalog\Model\Product $product, callable $proceed)
    {
        $result = $proceed(); 
        return  $result-($result * 0.05); 
    }
}
