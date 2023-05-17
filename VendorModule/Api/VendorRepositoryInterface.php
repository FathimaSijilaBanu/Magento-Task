<?php

namespace Codilar\VendorModule\Api;

use Codilar\VendorModule\Api\Data\VendorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface VendorRepositoryInterface
{
    /**
     * Get list of vendors.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \Codilar\VendorModule\Api\Data\VendorInterface[]
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Get vendor by ID.
     *
     * @param int $vendorId
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If vendor with the specified ID does not exist.
     */
    public function getById($vendorId);

    /**
     * Save vendor.
     *
     * @param \Codilar\VendorModule\Api\Data\VendorInterface $vendor
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     * @throws \Magento\Framework\Exception\LocalizedException If there is a problem with the input.
     */
    public function save(VendorInterface $vendor);

    /**
     * Delete vendor by ID.
     *
     * @param int $vendorId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException If vendor with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException If there is a problem with the input.
     */
    public function deleteById($vendorId);

    /**
     * Delete vendor.
     *
     * @param \Codilar\VendorModule\Api\Data\VendorInterface $vendor
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException If there is a problem with the input.
     */
    public function delete(VendorInterface $vendor);
}
