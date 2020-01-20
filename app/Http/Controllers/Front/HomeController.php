<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Product;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Front
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::query()
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('front-side.product_list', [
            'products' => $products
        ]);
    }
}
