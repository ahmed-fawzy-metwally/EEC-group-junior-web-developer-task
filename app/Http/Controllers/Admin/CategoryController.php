<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * return the related products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array of \Illuminate\Http\Products
     */
    public function getAllrelatedProducts(Request $request)
    {
        $category = Category::find($request->category);
        if (is_null($category))
            return [];
        else
            return $category->products;
    }

    /**
     * return the status if category founded or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean
     */
    public function checkCategoryFounded(Request $request)
    {
        $category = Category::find($request->category);
        if (is_null($category))
            return ['status' => false];
        else
            return ['status' => true];
    }
}
