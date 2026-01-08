@extends('layouts.master')

@section('title', 'About Us – The Boys')

@section('content')

<div class="tb-card p-4">

    <div class="row g-3">

        {{-- IMAGE / VISUAL --}}
        <div class="col-md-5">
            <div class="ratio ratio-4x3">
                <img
                    src="{{ asset('images/theboys_logo.jpg') }}"
                    alt="About The Boys"
                    class="w-100 h-100"
                    style="object-fit:cover;"
                >
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="col-md-7">

            <h1 class="mb-3" style="font-size:1.5rem;font-weight:600;">
                About Us
            </h1>

            {{-- WHO WE ARE --}}
            <h2 style="font-size:1.1rem;font-weight:600;color:var(--tb-blue);">
                Who We Are
            </h2>

            <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                The Boys is a digital commerce platform built with a focus on innovation, reliability, and long term growth.
                We believe strong digital infrastructure is essential for creating equal access to technology and economic opportunity.
            </p>

            <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                Our platform is designed to be scalable, secure, and accessible, supporting both users and businesses through modern digital solutions.
            </p>

            {{-- MISSION --}}
            <h2 class="mt-3" style="font-size:1.1rem;font-weight:600;color:var(--tb-blue);">
                Our Mission
            </h2>

            <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                Our mission is to strengthen digital infrastructure through continuous innovation.
                We aim to build technology that is efficient, reliable, and adaptable to future needs.
            </p>

            <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                By investing in innovation, we create a platform that supports sustainable industrial and economic development.
            </p>

            {{-- SDG 9 --}}
            <h2 class="mt-3" style="font-size:1.1rem;font-weight:600;color:var(--tb-blue);">
                Our Commitment to SDG 9
            </h2>

            <p style="font-size:0.9rem;font-weight:600;color:#111827;">
                Industry, Innovation, and Infrastructure
            </p>

            <p style="font-size:0.9rem;color:var(--tb-gray-text);">
                We actively support Sustainable Development Goal 9 by focusing on the following principles:
            </p>

            <ul style="font-size:0.9rem;color:var(--tb-gray-text);padding-left:1.2rem;">
                <li class="mb-2">
                    <strong>Building Reliable Digital Infrastructure</strong><br>
                    We develop and maintain stable systems that ensure consistent access, performance, and security for all users.
                </li>

                <li class="mb-2">
                    <strong>Encouraging Innovation</strong><br>
                    Our platform embraces modern technologies and development practices to improve user experience and operational efficiency.
                </li>

                <li>
                    <strong>Supporting Sustainable Industry</strong><br>
                    By providing digital tools for businesses and sellers, we help promote inclusive industrial growth through technology driven solutions.
                </li>
            </ul>

            {{-- BACK --}}
            <a href="{{ route('home') }}"
               class="d-inline-flex align-items-center mt-3"
               style="
                    gap:0.35rem;
                    padding:0.4rem 0.9rem;
                    border-radius:999px;
                    background:#9ca3af;
                    color:#ffffff;
                    font-size:0.85rem;
                    font-weight:500;
                    text-decoration:none;
                    transition:background 0.2s ease;
               "
               onmouseover="this.style.background='#000000'"
               onmouseout="this.style.background='#9ca3af'">

                <img
                    src="{{ asset('images/home_icon.png') }}"
                    alt="Home"
                    style="height:16px;width:16px;opacity:0.85;"
                >

                Back To Home
            </a>

        </div>
    </div>

</div>

@endsection
