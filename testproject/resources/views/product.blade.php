@extends('layouts.master')

@section('title', 'Product Details – The Boys')

@php
    $allProducts = [
        [
            'id' => 1,
            'name' => 'Gaming Headset',
            'category' => 'electronics',
            'price' => 350000,
            'image' => 'https://via.placeholder.com/600x380?text=Gaming+Headset',
        ],
        [
            'id' => 2,
            'name' => 'Mechanical Keyboard',
            'category' => 'electronics',
            'price' => 550000,
            'image' => 'https://via.placeholder.com/600x380?text=Mechanical+Keyboard',
        ],
        [
            'id' => 3,
            'name' => '4K Monitor',
            'category' => 'electronics',
            'price' => 2500000,
            'image' => 'https://via.placeholder.com/600x380?text=4K+Monitor',
        ],
        [
            'id' => 4,
            'name' => 'Action Figure – Hero',
            'category' => 'toys',
            'price' => 150000,
            'image' => 'https://via.placeholder.com/600x380?text=Action+Figure',
        ],
        [
            'id' => 5,
            'name' => 'RC Car',
            'category' => 'toys',
            'price' => 280000,
            'image' => 'https://via.placeholder.com/600x380?text=RC+Car',
        ],
        [
            'id' => 6,
            'name' => 'Building Blocks Set',
            'category' => 'toys',
            'price' => 120000,
            'image' => 'https://via.placeholder.com/600x380?text=Building+Blocks',
        ],
    ];

    $product = collect($allProducts)->firstWhere('id', $id);
@endphp

@section('content')

    @if(!$product)
        <div class="tb-card p-4">
            <p>Product not found.</p>
            <a href="{{ url('/') }}" class="tb-pill-link">Back to Home</a>
        </div>
    @else
        <div class="tb-card p-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <div class="ratio ratio-4x3">
                        <img
                            src="{{ $product['image'] }}"
                            alt="{{ $product['name'] }}"
                            class="w-100 h-100"
                            style="object-fit:cover;"
                        >
                    </div>
                </div>
                <div class="col-md-7">
                    <span class="badge rounded-pill"
                          style="background:#facc15;color:#111827;font-size:0.75rem;">
                        {{ strtoupper($product['category']) }}
                    </span>

                    <h1 class="mt-2 mb-2" style="font-size:1.4rem;font-weight:600;">
                        {{ $product['name'] }}
                    </h1>

                    <p style="font-size:1rem;font-weight:600;color:var(--tb-blue);">
                        Rp{{ number_format($product['price'], 0, ',', '.') }}
                    </p>

                    <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                        Short description placeholder for {{ $product['name'] }}.
                    </p>

                    <button class="tb-btn-primary">
                        Add to Cart
                    </button>

                    <a href="{{ url('/') }}" class="tb-pill-link" style="margin-left:0.5rem;">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection
