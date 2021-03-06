<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * return the status if product founded or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean
     */
    public function checkProductFounded(Request $request)
    {
        $product = Product::find($request->product);
        if (is_null($product))
            return ['status' => false];
        else
            return ['status' => true];
    }
}
