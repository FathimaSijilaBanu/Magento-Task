<?php
namespace Codilar\CustomTable\Api;

interface VendorInfoRepositoryInterface
{
    /**
     * Get vendor info by id
     *
     * @param int $id
     * @return \Codilar\CustomTable\Api\Data\VendorInfoInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If vendor info with the specified ID does not exist.
     */
    public function getById($id);

    /**
     * Get all vendor info
     *
     * @return \Codilar\CustomTable\Api\Data\VendorInfoInterface[]
     */
    public function getAll();

    /**
     * Delete vendor info by id
     *
     * @param int $id
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException If vendor info with the specified ID cannot be deleted.
     */
    public function deleteById($id);

    /**
     * Save vendor info
     *
     * @param \Codilar\CustomTable\Api\Data\VendorInfoInterface $vendorInfo
     * @return \Codilar\CustomTable\Api\Data\VendorInfoInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException If vendor info cannot be saved.
     */
    public function save(Data\VendorInfoInterface $vendorInfo);
}
