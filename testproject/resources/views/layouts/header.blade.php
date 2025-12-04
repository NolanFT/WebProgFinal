<header class="tb-header-fixed">
    <div class="tb-container">

        {{-- Logo --}}
        <div class="d-flex align-items-center mb-2" style="gap: 0.6rem;">
            <a href="{{ url('/') }}" class="d-inline-flex align-items-center" style="gap:0.5rem;">
                <img
                    src="{{ asset('the_boys_logo.jpg') }}"
                    alt="The Boys Logo"
                    style="height:42px;width:auto;border-radius:0.4rem;object-fit:cover;background:#0f172a;"
                >
            </a>
        </div>

        <div class="d-flex flex-wrap align-items-center justify-content-between" style="gap:0.75rem;">

            {{-- LEFT: Search + Filter --}}
            <div class="d-flex flex-grow-1 align-items-center" style="gap:0.5rem;max-width:620px;min-width:260px;">

                {{-- Search --}}
                <form
                    action="{{ url('/') }}"
                    method="GET"
                    class="d-flex flex-grow-1"
                    style="gap:0.4rem;"
                >
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        class="tb-input-rounded flex-grow-1"
                        placeholder="Search for products..."
                        style="padding-left:1rem;"
                    >

                    <button type="submit" class="tb-btn-primary d-inline-flex align-items-center">
                        <img
                            src="{{ asset('search_icon.jpg') }}"
                            alt="Search"
                            style="height:15px;width:15px;opacity:0.9;margin-right:0.3rem;"
                        >
                    </button>
                </form>

                {{-- Filter --}}
                <div class="dropdown">
                    <button
                        type="button"
                        class="tb-pill-link dropdown-toggle d-inline-flex align-items-center"
                        id="filterDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="border:1px solid rgba(148,163,184,0.5);white-space:nowrap;"
                    >
                        <img
                            src="{{ asset('filter_icon.jpg') }}"
                            alt="Filter"
                            style="height:16px;width:16px;opacity:0.85;margin-right:0.35rem;"
                        >
                        Categories
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                        <li><a class="dropdown-item" href="#">Blank 1</a></li>
                        <li><a class="dropdown-item" href="#">Blank 2</a></li>
                    </ul>
                </div>
            </div>

            {{-- RIGHT: Navbar --}}
            <nav class="d-flex flex-wrap align-items-center justify-content-end" style="gap:0.4rem;">
                <a href="{{ url('/') }}" class="tb-pill-link">Home</a>
                <a href="{{ url('/products') }}" class="tb-pill-link">Products</a>
                <a href="{{ url('/cart') }}" class="tb-pill-link">Cart</a>
                <a href="{{ url('/account') }}" class="tb-pill-link">Account</a>
            </nav>

        </div>
    </div>
</header>