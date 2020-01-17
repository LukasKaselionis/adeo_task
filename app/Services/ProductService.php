<?php

declare(strict_types=1);

namespace App\Services;


use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginatedData(): LengthAwarePaginator
    {
        return $this->productRepository->paginate();
    }

    /**
     * @param string $title
     * @param string $sku
     * @param bool $status
     * @param float $base_price
     * @param float $special_price
     * @param string $description
     * @return Product
     */
    public function createNewProduct(
        string $title,
        string $sku,
        bool $status,
        float $base_price,
        float $special_price,
        string $description
    ): Product
    {
        /** @var Product $product */
        $product = $this->productRepository->create([
            'title' => $title,
            'sku' => $sku,
            'is_enable' => $status,
            'base_price' => $base_price,
            'special_price' => $special_price,
            'description' => $description
        ]);

        return $product;
    }

    /**
     * @param int $id
     */
    public function destroyById(int $id)
    {
        $this->productRepository->delete($id);
    }
}