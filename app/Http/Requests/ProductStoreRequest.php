<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * Class ProductStoreRequest
 * @package App\Http\Requests
 */
class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:191',
            'sku' => 'required|string|min:7|max:7',
            'is_enable' => 'required|boolean',
            'base_price' => 'required|numeric',
            'discount' => 'nullable|numeric|between:0.01,1.00',
            'description' => 'required|string|min:10',
            'cover' => 'nullable|image'
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return strip_tags($this->input('title'));
    }

    /**
     * @return string
     */
    public function getSKU(): string
    {
        return strip_tags($this->input('sku'));
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return boolval($this->input('is_enable'));
    }

    /**
     * @return float
     */
    public function getBasePrice(): float
    {
        return floatval($this->input('base_price'));
    }

    /**
     * @return float
     */
    public function getDiscount(): ?float
    {
        return floatval($this->input('discount'));
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return strip_tags($this->input('description'));
    }

    /**
     * @return UploadedFile|null
     */
    public function getCover(): ?UploadedFile
    {
        return $this->file('cover');
    }

    /**
     * @return int|null
     */
    public function getDeleteCoverOption(): ?int
    {
        $deleteCover = $this->input('deleteCover');
        if ($deleteCover === null) {
            return null;
        }
        return (int)$deleteCover;
    }
}