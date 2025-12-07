@extends('layouts.master')

@section('title', 'Account – The Boys')

@php
    use Illuminate\Support\Str;

    /** @var \App\Models\User $user */
    $isAdmin      = session('role') === 'admin';
    $slug         = Str::slug($user->name);
    $profileImage = $user->profpic
        ? asset($user->profpic)
        : asset('images/default_avatar.png'); // create this or change path
@endphp

@section('content')

<style>
    .tb-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--tb-blue);
        color: #ffffff;
        border-radius: 999px;
        padding: 0.4rem 0.9rem;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    .tb-btn-secondary:hover {
        filter: brightness(1.12);
    }

    .tb-btn-danger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #dc2626;
        color: #ffffff;
        border-radius: 999px;
        padding: 0.4rem 0.9rem;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    .tb-btn-danger:hover {
        background: #ef4444;
    }
</style>

<div class="tb-card p-4 p-md-5 mb-3">

    {{-- Header --}}
    <h1 style="font-size:1.8rem;font-weight:700;margin-bottom:1rem;">Account</h1>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success py-2">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger py-2">
            {{ session('error') }}
        </div>
    @endif

    {{-- Profile row --}}
    <div class="d-flex flex-wrap align-items-center" style="gap:1.5rem;">

        {{-- Left: profile image --}}
        <div style="flex:0 0 96px;">
            <div style="
                width:96px;
                height:96px;
                border-radius:999px;
                overflow:hidden;
                border:2px solid #e5e7eb;
                background:#f3f4f6;
            ">
                <img src="{{ $profileImage }}"
                     alt="Profile picture"
                     class="w-100 h-100"
                     style="object-fit:cover;">
            </div>
        </div>

        {{-- Right: name + email --}}
        <div class="flex-grow-1">
            <h2 style="font-size:1.3rem;font-weight:600;margin-bottom:0.25rem;">
                {{ $user->name }}
            </h2>
            <p style="margin:0;font-size:0.95rem;color:var(--tb-gray-text);">
                {{ $user->email }}
            </p>
        </div>
    </div>

    {{-- Divider --}}
    <hr class="mt-4 mb-3">

    {{-- EDIT ACCOUNT --}}
    <div class="mb-3">
        <div class="d-flex align-items-center justify-content-between" style="max-width:420px;">
            <button type="button" class="tb-btn-secondary" id="btnToggleEdit">
                Edit Account
            </button>
        </div>

        @php
            $updateRoute = $isAdminPage
                ? route('account.admin.update', ['username' => $slug])
                : route('account.update', ['username' => $slug]);
        @endphp

        <div id="editFormWrapper" class="mt-3 d-none" style="max-width:420px;">
            <form method="POST" action="{{ $updateRoute }}">
                @csrf

                <div class="mb-2">
                    <label for="name" style="font-size:0.85rem;font-weight:500;">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </div>

                <div class="mb-2">
                    <label for="email" style="font-size:0.85rem;font-weight:500;">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" style="font-size:0.85rem;font-weight:500;">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="tb-btn-secondary">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    {{-- DELETE ACCOUNT --}}
    <div class="mb-3">
        <div class="d-flex align-items-center justify-content-between" style="max-width:420px;">
            <button type="button" class="tb-btn-danger" id="btnToggleDelete">
                Delete Account
            </button>
        </div>

        @php
            $deleteRoute = $isAdminPage
                ? route('account.admin.delete', ['username' => $slug])
                : route('account.delete', ['username' => $slug]);
        @endphp

        <div id="deleteFormWrapper" class="mt-3 d-none" style="max-width:420px;">
            <form method="POST"
                  action="{{ $deleteRoute }}"
                  onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf

                <div class="mb-2">
                    <label for="delete_password_confirmation" style="font-size:0.85rem;font-weight:500;">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="delete_password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="tb-btn-danger">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>

    {{-- Sign out --}}
    <div class="mt-4" style="max-width:420px;">
        <a href="{{ route('logout') }}"
           class="tb-btn-danger w-100 text-center"
           style="display:inline-flex;justify-content:center;align-items:center;">
            Sign Out
        </a>
    </div>

    {{-- Admin / User switch button --}}
    @if($isAdmin)
        <div class="mt-4" style="max-width:420px;">
            @if($isAdminPage)
                {{-- Currently on /a/... -> show User button to go to /u/... --}}
                <a href="{{ route('home.user', ['username' => $slug]) }}"
                   class="tb-btn-secondary w-100 text-center"
                   style="display:inline-flex;justify-content:center;align-items:center;">
                    User
                </a>
            @else
                {{-- Currently on /u/... -> show Admin button to go to /a/... --}}
                <a href="{{ route('admin.user', ['username' => $slug]) }}"
                   class="tb-btn-secondary w-100 text-center"
                   style="display:inline-flex;justify-content:center;align-items:center;">
                    Admin
                </a>
            @endif
        </div>
    @endif

</div>

{{-- Simple JS toggles --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn   = document.getElementById('btnToggleEdit');
        const editWrap  = document.getElementById('editFormWrapper');
        const delBtn    = document.getElementById('btnToggleDelete');
        const delWrap   = document.getElementById('deleteFormWrapper');

        if (editBtn && editWrap) {
            editBtn.addEventListener('click', function () {
                editWrap.classList.toggle('d-none');
            });
        }

        if (delBtn && delWrap) {
            delBtn.addEventListener('click', function () {
                delWrap.classList.toggle('d-none');
            });
        }
    });
</script>

@endsection