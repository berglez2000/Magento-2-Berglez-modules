<?php

namespace Berglez\ProductApi\Model;

use Berglez\ProductApi\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ProductRepository as MagentoProductRepository;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var MagentoProductRepository
     */
    protected MagentoProductRepository $productRepository;

    public function __construct(
        MagentoProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $id
     * @return ProductInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): ProductInterface
    {
        try {
            return $this->productRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            throw new NoSuchEntityException(__('Product with ID "%1" does not exist.', $id));
        }
    }
}
