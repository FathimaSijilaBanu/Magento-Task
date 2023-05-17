<?php

namespace Codilar\CustomModule\Model;

use Magento\Framework\Model\AbstractModel;

class Pincode extends AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Codilar\CustomModule\Model\ResourceModel\Pincode');
    }
}
