<?php
namespace Codilar\CustomTable\Model\ResourceModel;

class VendorInfo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'Codilar_CustomTable_vendor_info';
    protected $_eventObject = 'vendor_info';

    protected function _construct()
    {
        $this->_init('vendor_info', 'id');
    }
}
