<?php
namespace Codilar\CustomTable\Model;

use Codilar\CustomTable\Api\Data\VendorInfoInterface;
use Codilar\CustomTable\Api\Data\VendorInfoInterfaceFactory;
use Codilar\CustomTable\Api\Data\VendorInfoSearchResultsInterfaceFactory;
use Codilar\CustomTable\Api\VendorInfoRepositoryInterface;
use Codilar\CustomTable\Model\ResourceModel\VendorInfo as VendorInfoResource;
use Codilar\CustomTable\Model\ResourceModel\VendorInfo\CollectionFactory as VendorInfoCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;


class VendorInfoRepository implements VendorInfoRepositoryInterface
{
    /**
     * @var VendorInfoResource
     */
    protected $resource;

    /**
     * @var VendorInfoInterfaceFactory
     */
    protected $vendorInfoFactory;

    /**
     * @var VendorInfoSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var VendorInfoCollectionFactory
     */
    protected $vendorInfoCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    public function __construct(
        VendorInfoResource $resource,
        VendorInfoInterfaceFactory $vendorInfoFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        VendorInfoCollectionFactory $vendorInfoCollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->vendorInfoFactory = $vendorInfoFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->vendorInfoCollectionFactory = $vendorInfoCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save vendor info.
     *
     * @param VendorInfoInterface $vendorInfo
     * @return VendorInfoInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(VendorInfoInterface $vendorInfo)
    {
        try {
            $this->resource->save($vendorInfo);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__($exception->getMessage()));
        }
        return $vendorInfo;
    }
/**
 * Retrieve vendor info.
 *
 * @param int $vendorInfoId
 * @return VendorInfoInterface
 * @throws \Magento\Framework\Exception\NoSuchEntityException
 */
public function getById($vendorId)
{
    $vendor = $this->vendorInfoFactory->create();
    $this->resource->load($vendor, $vendorId);
    if (!$vendor->getId()) {
        throw new NoSuchEntityException(__('Vendor with id "%1" does not exist.', $vendorId));
    }
    return $vendor;
}


    /**
     * Delete vendor info.
     *
     * @param VendorInfoInterface $vendorInfo
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(VendorInfoInterface $vendorInfo)
    {
        try {
            $this->resource->delete($vendorInfo);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
    
    /**
     * Delete vendor info by id.
     *
     * @param int $id
     * @return bool true on success
     *
     */
    public function deleteById($id)
{
    $vendorInfo = $this->getById($id);
    return $this->delete($vendorInfo);
}

public function getAll()
{
    $collection = $this->vendorInfoCollectionFactory->create();
    return $collection->getItems();
}

/**
 * Retrieve vendor info list.
 *
 * @param SearchCriteriaInterface $searchCriteria
 * @return SearchResultsInterface
 * @throws \Magento\Framework\Exception\LocalizedException
 */
public function getList(SearchCriteriaInterface $searchCriteria)
{
    /** @var \Codilar\CustomTable\Model\ResourceModel\VendorInfo\Collection $collection */
    $collection = $this->vendorInfoCollectionFactory->create();

    $this->collectionProcessor->process($searchCriteria, $collection);

    /** @var SearchResultsInterface $searchResults */
    $searchResults = $this->searchResultsFactory->create();
    $searchResults->setSearchCriteria($searchCriteria);
    $searchResults->setItems($collection->getItems());
    $searchResults->setTotalCount($collection->getSize());

    return $searchResults;
}
public function load(VendorInfoInterface $vendorInfo, $value, $field = null)
{
    $vendorInfoModel = $this->vendorInfoFactory->create();
    $this->resource->load($vendorInfoModel, $value, $field);
    if (!$vendorInfoModel->getId()) {
        throw new NoSuchEntityException(__('Vendor Info with specified ID "%1" not found.', $value));
    }
    $vendorInfo->setData($vendorInfoModel->getData());
    return $this;
}

}