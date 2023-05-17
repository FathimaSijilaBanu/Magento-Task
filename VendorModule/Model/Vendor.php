<?php
namespace Codilar\VendorModule\Model;

use Magento\Framework\Model\AbstractModel;

class Vendor extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Codilar\VendorModule\Model\ResourceModel\Vendor');
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function setId($Id)
    {
        return $this->setData('id', $Id);
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    public function getDescription()
    {
        return $this->getData('description');
    }

    public function setDescription($description)
    {
        return $this->setData('description', $description);
    }

    public function getEmail()
    {
        return $this->getData('email');
    }

    public function setEmail($email)
    {
        return $this->setData('email', $email);
    }
}
