<?php

declare(strict_types=1);

namespace App\Services;


use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    const FILE_DIR = 'product';
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
        return $this->productRepository->paginate(5);
    }

    /**
     * @param string $title
     * @param string $sku
     * @param bool $status
     * @param float $base_price
     * @param float $special_price
     * @param string $description
     * @param UploadedFile|null $cover
     * @return Product
     */
    public function createNewProduct(
        string $title,
        string $sku,
        bool $status,
        float $base_price,
        float $special_price,
        string $description,
        ?UploadedFile $cover = null
    ): Product
    {
        /** @var Product $product */
        $product = $this->productRepository->create([
            'title' => $title,
            'sku' => $sku,
            'is_enable' => $status,
            'base_price' => $base_price,
            'special_price' => $special_price,
            'description' => $description,
        ]);

        if ($cover !== null) {
            $uploadedFile = $this->uploadImage($cover, $product->id);
            $product->cover = $uploadedFile;
            $product->save();
        }

        return $product;
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $sku
     * @param bool $status
     * @param float $base_price
     * @param float $special_price
     * @param string $description
     * @param int|null $deleteCover
     * @param UploadedFile|null $cover
     * @return int
     */
    public function updateById(
        int $id,
        string $title,
        string $sku,
        bool $status,
        float $base_price,
        float $special_price,
        string $description,
        int $deleteCover = null,
        ?UploadedFile $cover = null
    ): int
    {
        $product = $this->productRepository->makeQuery()->findOrFail($id);

        $uploadedFile = $product->cover;
        if ($deleteCover !== null) {
            Storage::delete($product->cover);
            $uploadedFile = null;
        }
        if ($cover !== null) {
            $uploadedFile = $this->uploadImage($cover, $product->id);
        }


        $updated = $this->productRepository->update([
            'title' => $title,
            'sku' => $sku,
            'is_enable' => $status,
            'base_price' => $base_price,
            'special_price' => $special_price,
            'description' => $description,
            'cover' => $uploadedFile
        ], $id);

        return $updated;
    }

    /**
     * @param int $id
     */
    public function destroyById(int $id)
    {
        $this->productRepository->delete($id);
    }

    /**
     * @param UploadedFile|null $image
     * @param int $productId
     * @return string|null
     */
    private function uploadImage(?UploadedFile $image, int $productId): ?string
    {
        if ($image === null) {
            return null;
        }
        return $image->store(self::FILE_DIR . '/' . $productId);
    }

}