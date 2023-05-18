<?php
namespace Codilar\VendorTable\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ProductAddAfter implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');
        $item->setQty($item->getQty() +5);
    }
}
