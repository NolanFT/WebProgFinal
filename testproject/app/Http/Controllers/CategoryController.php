<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function home(Request $request)
    {
        // Hardcoded products
        $allProducts = collect([
            [
                'id'       => 1,
                'name'     => 'Gaming Headset',
                'category' => 'electronics',
                'price'    => 350000,
                'image'    => 'https://via.placeholder.com/400x260?text=Gaming+Headset',
            ],
            [
                'id'       => 2,
                'name'     => 'Mechanical Keyboard',
                'category' => 'electronics',
                'price'    => 550000,
                'image'    => 'https://via.placeholder.com/400x260?text=Mechanical+Keyboard',
            ],
            [
                'id'       => 3,
                'name'     => '4K Monitor',
                'category' => 'electronics',
                'price'    => 2500000,
                'image'    => 'https://via.placeholder.com/400x260?text=4K+Monitor',
            ],
            [
                'id'       => 4,
                'name'     => 'Action Figure – Hero',
                'category' => 'toys',
                'price'    => 150000,
                'image'    => 'https://via.placeholder.com/400x260?text=Action+Figure',
            ],
            [
                'id'       => 5,
                'name'     => 'RC Car',
                'category' => 'toys',
                'price'    => 280000,
                'image'    => 'https://via.placeholder.com/400x260?text=RC+Car',
            ],
            [
                'id'       => 6,
                'name'     => 'Building Blocks Set',
                'category' => 'toys',
                'price'    => 120000,
                'image'    => 'https://via.placeholder.com/400x260?text=Building+Blocks',
            ],
        ]);

        $category = $request->input('category'); // electronics / toys / null
        $query    = $request->input('q');        // search query

        // Filter products
        $products = $allProducts
            ->when($category, function (Collection $c) use ($category) {
                return $c->where('category', $category);
            })
            ->when($query, function (Collection $c) use ($query) {
                $q = mb_strtolower($query);
                return $c->filter(function ($p) use ($q) {
                    return str_contains(mb_strtolower($p['name']), $q);
                });
            });

        // All unique categories, sorted
        $allCategories = $allProducts
            ->pluck('category')
            ->unique()
            ->sort()
            ->values();

        // Recent categories: current category first, then others
        $recentCategories = $allCategories;
        if ($category && $allCategories->contains($category)) {
            $recentCategories = collect([$category])
                ->merge($allCategories->reject(fn ($c) => $c === $category));
        }

        // Limit to 3
        $recentCategories = $recentCategories->take(3);

        return view('home', [
            'products'         => $products,
            'category'         => $category,
            'query'            => $query,
            'recentCategories' => $recentCategories,
        ]);
    }
}
