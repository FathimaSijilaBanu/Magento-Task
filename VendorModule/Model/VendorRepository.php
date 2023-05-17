<?php

namespace Codilar\VendorModule\Model;

use Codilar\VendorModule\Api\Data\VendorInterface;
use Codilar\VendorModule\Api\VendorRepositoryInterface;
use Codilar\VendorModule\Model\ResourceModel\Vendor\CollectionFactory as VendorCollectionFactory;
use Codilar\VendorModule\Model\ResourceModel\Vendor as VendorResourceModel;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Codilar\VendorModule\Model\VendorFactory;

class VendorRepository implements VendorRepositoryInterface
{
    protected $vendorCollectionFactory;
    protected $vendorResourceModel;
    protected $vendorFactory;

    public function __construct(
        VendorCollectionFactory $vendorCollectionFactory,
        VendorResourceModel $vendorResourceModel,
        VendorFactory $vendorFactory
    ) {
        $this->vendorCollectionFactory = $vendorCollectionFactory;
        $this->vendorResourceModel = $vendorResourceModel;
        $this->vendorFactory = $vendorFactory;
    }

    public function save(VendorInterface $vendor)
    {
        try {
            $this->vendorResourceModel->save($vendor);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $vendor;
    }

    public function getById($vendorId)
    {
        $vendor = $this->vendorFactory->create();
        $this->vendorResourceModel->load($vendor, $vendorId);
        if (!$vendor->getId()) {
            throw new NoSuchEntityException(__('Vendor with id "%1" does not exist.', $vendorId));
        }
        return $vendor;
    }

    public function delete(VendorInterface $vendor)
    {
        try {
            $this->vendorResourceModel->delete($vendor);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($vendorId)
    {
        $vendor = $this->getById($vendorId);
        return $this->delete($vendor);
    }

    public function getList(?SearchCriteriaInterface $searchCriteria = null)
    {
        $collection = $this->vendorCollectionFactory->create();
        if ($searchCriteria) {
            foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
                foreach ($filterGroup->getFilters() as $filter) {
                    $collection->addFieldToFilter($filter->getField(), [$filter->getConditionType() => $filter->getValue()]);
                }
            }
            if ($searchCriteria->getSortOrders()) {
                foreach ($searchCriteria->getSortOrders() as $sortOrder) {
                    $collection->addOrder(
                        $sortOrder->getField(),
                        ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                    );
                }
            }
            $collection->setCurPage($searchCriteria->getCurrentPage());
            $collection->setPageSize($searchCriteria->getPageSize());
        }
        return $collection->getItems();
    }
}
