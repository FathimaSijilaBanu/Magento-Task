<?php

namespace Codilar\VendorTable\Plugin;

use Magento\Catalog\Model\Product;

class ProductPluginB
{
    public function beforeGetPrice(Product $subject)
    {
        $result = $subject->getData('price');
        $subject->setData('price', ($result * 1.05));
        return $subject;
    }
}
