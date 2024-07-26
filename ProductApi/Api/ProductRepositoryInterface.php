<?php

namespace Berglez\ProductApi\Api;

use Magento\Catalog\Api\Data\ProductInterface;

interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return ProductInterface
     */
    public function getById(int $id): ProductInterface;
}
