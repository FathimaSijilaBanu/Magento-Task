<?php
namespace Codilar\CustomTable\Block;

use Magento\Framework\View\Element\Template;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;

class VendorInfo extends Template
{
    protected $vendorInfoRepository;

    public function __construct(
        Template\Context $context,
        VendorInfoRepositoryInterface $vendorInfoRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->vendorInfoRepository = $vendorInfoRepository;
    }

    public function getVendorInfoCollection()
    {
        return $this->vendorInfoRepository->getAll();
    }
}
