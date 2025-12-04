@extends('layouts.master')

@section('title', 'The Boys – Home')

@php
    $allProducts = [
        [
            'id' => 1,
            'name' => 'Gaming Headset',
            'category' => 'electronics',
            'price' => 350000,
            'image' => 'https://via.placeholder.com/400x260?text=Gaming+Headset',
        ],
        [
            'id' => 2,
            'name' => 'Mechanical Keyboard',
            'category' => 'electronics',
            'price' => 550000,
            'image' => 'https://via.placeholder.com/400x260?text=Mechanical+Keyboard',
        ],
        [
            'id' => 3,
            'name' => '4K Monitor',
            'category' => 'electronics',
            'price' => 2500000,
            'image' => 'https://via.placeholder.com/400x260?text=4K+Monitor',
        ],
        [
            'id' => 4,
            'name' => 'Action Figure – Hero',
            'category' => 'toys',
            'price' => 150000,
            'image' => 'https://via.placeholder.com/400x260?text=Action+Figure',
        ],
        [
            'id' => 5,
            'name' => 'RC Car',
            'category' => 'toys',
            'price' => 280000,
            'image' => 'https://via.placeholder.com/400x260?text=RC+Car',
        ],
        [
            'id' => 6,
            'name' => 'Building Blocks Set',
            'category' => 'toys',
            'price' => 120000,
            'image' => 'https://via.placeholder.com/400x260?text=Building+Blocks',
        ],
    ];

    $category = request('category'); // electronics / toys / null
    $query    = request('q');        // search query from header search

    $products = collect($allProducts)
        ->when($category, function ($c) use ($category) {
            return $c->where('category', $category);
        })
        ->when($query, function ($c) use ($query) {
            $q = mb_strtolower($query);
            return $c->filter(function ($p) use ($q) {
                return str_contains(mb_strtolower($p['name']), $q);
            });
        });
@endphp

@section('content')

    {{-- Hero / intro --}}
    <section class="mb-4">
        <div class="tb-card p-4 p-md-4" style="
            background: radial-gradient(circle at top left, var(--tb-yellow) 0, var(--tb-blue) 45%, var(--tb-black) 100%);
            color: #f9fafb;
            border: none;
        ">
            <div class="row align-items-end gy-3">
                <div class="col-md-8">
                    <span class="badge rounded-pill" style="background:#facc15;color:#111827;font-size:0.7rem;letter-spacing:0.08em;">
                        ELECTRONICS & TOYS MARKETPLACE
                    </span>
                    <h1 class="mt-2 mb-2" style="font-size:1.6rem;font-weight:600;">
                        Welcome to The Boys
                    </h1>
                    <p class="mb-0" style="font-size:0.9rem;max-width:420px;">
                        Browse electronics and toys in a clean.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Category filter row --}}
    <section class="mb-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2" style="gap:0.5rem;">
            <h2 class="mb-0" style="font-size:1rem;font-weight:600;">Categories</h2>

            <div class="d-flex flex-wrap" style="gap:0.4rem;">
                {{-- All --}}
                <a
                    href="{{ url('/').($query ? '?q='.urlencode($query) : '') }}"
                    class="tb-pill-link"
                    style="background: {{ $category ? 'transparent' : 'var(--tb-blue)' }}; color: {{ $category ? '#e5e7eb' : '#f9fafb' }};"
                >
                    All
                </a>

                {{-- Electronics --}}
                <a
                    href="{{ url('/?category=electronics' . ($query ? '&q='.urlencode($query) : '')) }}"
                    class="tb-pill-link"
                    style="background: {{ $category === 'electronics' ? 'var(--tb-blue)' : 'transparent' }};
                           color: {{ $category === 'electronics' ? '#f9fafb' : '#e5e7eb' }};"
                >
                    Electronics
                </a>

                {{-- Toys --}}
                <a
                    href="{{ url('/?category=toys' . ($query ? '&q='.urlencode($query) : '')) }}"
                    class="tb-pill-link"
                    style="background: {{ $category === 'toys' ? 'var(--tb-blue)' : 'transparent' }};
                           color: {{ $category === 'toys' ? '#f9fafb' : '#e5e7eb' }};"
                >
                    Toys
                </a>
            </div>
        </div>

        @if($category || $query)
            <div style="font-size:0.8rem;color:var(--tb-gray-text);">
                @if($category)
                    <span>Filter: <strong>{{ ucfirst($category) }}</strong></span>
                @endif
                @if($category && $query)
                    <span> · </span>
                @endif
                @if($query)
                    <span>Search: <strong>{{ $query }}</strong></span>
                @endif
            </div>
        @endif
    </section>

    {{-- Product grid --}}
    <section>
        @if($products->isEmpty())
            <div class="tb-card p-4">
                <p class="mb-0" style="font-size:0.9rem;color:var(--tb-gray-text);">
                    No products found for this filter/search.
                </p>
            </div>
        @else
            <div class="row g-3">
                @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="tb-card h-100 overflow-hidden">
                            <div class="ratio ratio-4x3">
                                <img
                                    src="{{ $product['image'] }}"
                                    alt="{{ $product['name'] }}"
                                    class="w-100 h-100"
                                    style="object-fit:cover;"
                                >
                            </div>
                            <div class="p-2 p-md-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="badge rounded-pill"
                                          style="background:#facc15;color:#111827;font-size:0.7rem;">
                                        {{ ucfirst($product['category']) }}
                                    </span>
                                </div>
                                <h3 class="mb-1" style="font-size:0.9rem;font-weight:600;">
                                    {{ $product['name'] }}
                                </h3>
                                <p class="mb-2" style="font-size:0.9rem;font-weight:600;color:var(--tb-blue);">
                                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                                </p>
                                <div class="d-flex gap-2">
                                    <button class="tb-btn-primary flex-fill">
                                        Add to Cart
                                    </button>
                                    <a href="{{ url('/cart') }}" class="tb-pill-link"
                                       style="background:var(--tb-yellow);color:#111827;font-size:0.75rem;">
                                        Buy
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

@endsection