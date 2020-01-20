<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class ProductController
 * @package App\Http\Controllers\Front
 */
class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return Factory|View
     */
    public function show(Product $product): View
    {
        return view('front-side.product_item', [
            'product' => $product
        ]);
    }
}
