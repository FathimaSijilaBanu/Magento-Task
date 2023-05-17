<?php

namespace Codilar\CustomTable\Model\ResourceModel\VendorInfo;

use Codilar\CustomTable\Model\VendorInfo;
use Codilar\VendorTable\Model\ResourceModel\VendorInfo as VendorResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vendor_id';
    protected $_eventPrefix = 'vendor_info_collection';
    protected $_eventObject = 'vendor_info_collection';

    protected function _construct()
    {
        $this->_init(VendorInfo::class, VendorResourceModel::class);
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->joinLeft(
            ['vendor_table' => $this->getTable('codilar_vendor')],
            'main_table.vendor_id = vendor_table.entity_id',
            ['vendor_name']
        );
    }
}
