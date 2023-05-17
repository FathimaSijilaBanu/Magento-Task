<?php
namespace Codilar\CustomTable\Model\ResourceModel\VendorInfo;

use Codilar\CustomTable\Model\VendorInfo;
use Codilar\CustomTable\Model\ResourceModel\VendorInfo as VendorInfoResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class VendorInfoCollection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'customtable_vendorinfo_collection';
    protected $_eventObject = 'vendorinfo_collection';

    protected function _construct()
    {
        $this->_init(VendorInfo::class, VendorInfoResource::class);
    }
}
