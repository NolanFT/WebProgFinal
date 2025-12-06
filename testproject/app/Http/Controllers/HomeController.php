<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Homepage: list products with category + search filters.
     */
    public function home(Request $request)
    {
        $categoryId = $request->filled('category') ? (int) $request->input('category') : null;

        $query = $request->input('q');

        // Load categories
        $categories = Category::orderBy('name')->get();

        // Map id → name for Blade
        $categoryNames = $categories
            ->pluck('name', 'id')
            ->toArray();

        // Base product query
        $productsQuery = Product::query();

        // FILTER BY CATEGORY
        if (!is_null($categoryId)) {
            $productsQuery->where('category_id', $categoryId);
        }

        // FILTER BY SEARCH
        if ($query) {
            $q = strtolower($query);
            $productsQuery->whereRaw('LOWER(name) LIKE ?', ["%{$q}%"]);
        }

        $products = $productsQuery->get();

        // RECENT CATEGORIES (max 3)
        $recentCategories = $categories;

        if (!is_null($categoryId) && $categories->pluck('id')->contains($categoryId)) {
            $selected = $categories->firstWhere('id', $categoryId);

            $recentCategories = collect([$selected])->merge(
                $categories->where('id', '!=', $categoryId)
            );
        }

        $recentCategories = $recentCategories->take(3);

        return view('home', [
            'products'         => $products,
            'categoryId'       => $categoryId,
            'query'            => $query,
            'recentCategories' => $recentCategories,
            'categories'       => $categories,
            'categoryNames'    => $categoryNames,
        ]);
    }

    public function homeForUser(Request $request, string $username)
    {
        if (!session('user_id')) {
            return redirect()->route('login');
        }

        $sessionName  = session('name');
        $expectedSlug = Str::slug($sessionName);

        if ($username !== $expectedSlug) {
            return redirect()->route('home.user', [
                'username' => $expectedSlug,
            ] + $request->query());
        }
        return $this->home($request);
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