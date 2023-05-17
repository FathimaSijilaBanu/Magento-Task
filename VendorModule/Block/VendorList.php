<?php
namespace Codilar\VendorModule\Block;

use Codilar\VendorModule\Api\VendorRepositoryInterface;
use Magento\Framework\View\Element\Template;

class VendorList extends Template
{
    private $vendorRepository;

    public function __construct(
        Template\Context $context,
        VendorRepositoryInterface $vendorRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->vendorRepository = $vendorRepository;
    }

    public function getVendorCollection()
    {
        return $this->vendorRepository->getList();
    }

    protected function _prepareLayout()
    {
        $vendorCollection = $this->getVendorCollection();
        $this->setData('vendorCollection', $vendorCollection);
        parent::_prepareLayout();
    }
}
