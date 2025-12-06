@extends('layouts.master')

@section('title', 'The Boys – Home')

@php
    $currentCategoryId = request()->filled('category') ? (int) request('category') : null;
    $currentQuery      = request('q');
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
                    <span class="badge rounded-pill"
                          style="background:#facc15;color:#111827;font-size:0.7rem;letter-spacing:0.08em;">
                        ELECTRONICS & TOYS MARKETPLACE
                    </span>
                    <h1 class="mt-2 mb-2" style="font-size:1.6rem;font-weight:600;">
                        Welcome to The Boys
                    </h1>
                    <p class="mb-0" style="font-size:0.9rem;max-width:420px;">
                        Browse electronics and toys in a clean, focused storefront.
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
                @php
                    $allUrl = $currentQuery
                    ? url('/admin?q=' . urlencode($currentQuery))
                    : url('/admin');
                @endphp

                <a
                    href="{{ $allUrl }}"
                    class="tb-pill-link"
                    style="
                        background: {{ $allActive ? 'var(--tb-blue)' : 'transparent' }};
                        color: {{ $allActive ? '#f9fafb' : '#e5e7eb' }};
                    "
                >
                    All
                </a>

                {{-- First 5 categories from DB --}}
                @foreach($categories->take(5) as $cat)
                    @php
                        $active    = $currentCategoryId === $cat->id;
                        $qParam    = $currentQuery ? '&q=' . urlencode($currentQuery) : '';
                        $catUrl = url('/admin?category=' . $cat->id . $qParam);
                        $bgColor   = $active ? 'var(--tb-blue)' : 'transparent';
                        $textColor = $active ? '#f9fafb' : '#e5e7eb';
                    @endphp

                    <a
                        href="{{ $catUrl }}"
                        class="tb-pill-link"
                        style="background: {{ $bgColor }}; color: {{ $textColor }};"
                    >
                        {{ ucfirst($cat->name) }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Active filter summary --}}
        @if($currentCategoryId || $currentQuery)
            <div style="font-size:0.8rem;color:var(--tb-gray-text);">
                @if($currentCategoryId)
                    @php
                        $selectedCategory = $categories->firstWhere('id', $currentCategoryId);
                    @endphp
                    @if($selectedCategory)
                        <span>Filter: <strong>{{ ucfirst($selectedCategory->name) }}</strong></span>
                    @endif
                @endif

                @if($currentCategoryId && $currentQuery)
                    <span> · </span>
                @endif

                @if($currentQuery)
                    <span>Search: <strong>{{ $currentQuery }}</strong></span>
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

                            {{-- Clickable image to product detail --}}
                            <a href="{{ route('products.show', $product->id) }}" class="ratio ratio-4x3 d-block">
                                <img
                                    src="{{ $product->image }}"
                                    alt="{{ $product->name }}"
                                    class="w-100 h-100"
                                    style="object-fit:cover;"
                                >
                            </a>

                            <div class="p-2 p-md-3">

                                {{-- Category badge (clickable, filters by category) --}}
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    @if($product->category)
                                        @php
                                            $qParam = $currentQuery ? '&q=' . urlencode($currentQuery) : '';
                                            $catUrl = url('/?category=' . $product->category_id . $qParam);
                                        @endphp
                                        <a href="{{ $catUrl }}">
                                            <span class="badge rounded-pill"
                                                  style="background:#facc15;color:#111827;font-size:0.7rem;">
                                                {{ ucfirst($product->category->name) }}
                                            </span>
                                        </a>
                                    @endif
                                </div>

                                {{-- Clickable name to product detail --}}
                                <h3 class="mb-1" style="font-size:0.9rem;font-weight:600;">
                                    <a
                                        href="{{ route('products.show', $product->id) }}"
                                        style="color:inherit;text-decoration:none;"
                                    >
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                {{-- Price --}}
                                <p class="mb-2" style="font-size:0.9rem;font-weight:600;color:var(--tb-blue);">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                {{-- Edit & Delete Button --}}
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="tb-btn-secondary flex-fill text-center">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                        method="POST"
                                        class="flex-fill"
                                        onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="tb-btn-danger w-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

@endsection