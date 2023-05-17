<?php

namespace Codilar\VendorModule\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Codilar\VendorModule\Model\Vendor::class,
            \Codilar\VendorModule\Model\ResourceModel\Vendor::class
        );
    }
}
