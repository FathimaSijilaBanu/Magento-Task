<?php

namespace Codilar\VendorModule\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    const MAIN_TABLE = 'vendor_data';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }

    public function save(AbstractModel $vendor)
    {
        return parent::save($vendor);
    }
}
