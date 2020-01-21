<?php

declare(strict_types=1);

namespace App\Helpers;


/**
 * Class calculate
 * @package App\Helpers
 */
class calculate
{
    public static function calculateVAT(float $base_price, float $VAT): float
    {
        $tax_value = $base_price * $VAT;

        return round($tax_value, 2);
    }

    public static function calculateFinalPrice(float $base_price, float $VAT): float
    {
        $priceWithVAT = ($base_price * $VAT) + $base_price;

        return round($priceWithVAT, 2);
    }

    public static function calculateFinalPriceWithDiscount(float $base_price, float $VAT, float $discount)
    {
        $priceWithVAT = ($base_price * $VAT) + $base_price;

        $product_discount = ($priceWithVAT * $discount);

        $final_price = $priceWithVAT - $product_discount;

        return round($final_price, 2);
    }

}