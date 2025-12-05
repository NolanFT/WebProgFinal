<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Homepage: list products with category + search filters.
     */
    public function home(Request $request)
    {
        $categoryId = $request->input('category');  // category_id
        $query      = $request->input('q');         // search term

        // Load categories from DB
        $categories = Category::orderBy('name')->get();

        // Base product query
        $products = Product::query();

        // FILTER BY CATEGORY
        if ($categoryId) {
            $products->where('category_id', intval($categoryId));
        }

        // FILTER BY SEARCH
        if ($query) {
            $q = strtolower($query);
            $products->whereRaw('LOWER(name) LIKE ?', ["%{$q}%"]);
        }

        $products = $products->get();

        // RECENT CATEGORIES (max 3)
        $recentCategories = $categories;

        if ($categoryId && $categories->pluck('id')->contains(intval($categoryId))) {
            $selected = $categories->firstWhere('id', intval($categoryId));

            $recentCategories = collect([$selected])->merge(
                $categories->where('id', '!=', intval($categoryId))
            );
        }

        $recentCategories = $recentCategories->take(3);

        return view('home', [
            'products'         => $products,
            'categoryId'       => $categoryId,
            'query'            => $query,
            'recentCategories' => $recentCategories,
            'categories'       => $categories,
        ]);
    }

    /**
     * Product detail page.
     */
    public function productDetail($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            abort(404, "Product not found.");
        }

        return view('productdetail', compact('product'));
    }
}