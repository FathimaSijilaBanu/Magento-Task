<?php

namespace Codilar\VendorModule\Api\Data;

interface VendorInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const EMAIL = 'email';

    /**
     * Get ID.
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID.
     *
     * @param int $id
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     */
    public function setId($id);

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name.
     *
     * @param string $name
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     */
    public function setName($name);

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description.
     *
     * @param string $description
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     */
    public function setDescription($description);

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email.
     *
     * @param string $email
     * @return \Codilar\VendorModule\Api\Data\VendorInterface
     */
    public function setEmail($email);
}
