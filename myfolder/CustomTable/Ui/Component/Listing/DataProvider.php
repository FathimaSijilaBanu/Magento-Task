<?php
namespace Codilar\CustomTable\Ui\Component\Listing;

use Magento\Framework\Api\Search\SearchResultFactory;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    protected $searchCriteriaBuilder;
    protected $searchResultFactory;
    protected $vendorInfoRepository;
    protected $searchReporting;

    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultFactory $searchResultFactory,
        VendorInfoRepositoryInterface $vendorInfoRepository,
        ReportingInterface $searchReporting
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
        $this->vendorInfoRepository = $vendorInfoRepository;
        $this->searchReporting = $searchReporting;
    }
    public function getData()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchCriteria->setRequestName('vendor_info_listing_data_source');
        $searchResult = $this->vendorInfoRepository->getList($searchCriteria);
        $data = [
            'items' => [],
            'totalRecords' => $searchResult->getTotalCount(),
        ];
        foreach ($searchResult->getItems() as $item) {
            $data['items'][] = $item->getData();
        }
        return $data;
    }
    
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        // Implement addFilter() method if needed
    }

    public function addOrder($field, $direction)
    {
        // Implement addOrder() method if needed
    }

    public function setLimit($offset, $size)
    {
        // Implement setLimit() method if needed
    }

    public function getConfigData()
    {
        return [];
    }

    public function setConfigData($config)
    {
        // Implement setConfigData() method if needed
    }

    public function getMeta()
    {
        return [];
    }
}
