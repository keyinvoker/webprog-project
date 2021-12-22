<link rel="stylesheet" href="{{ asset('css/dy.id/navbar.css')}}">
<nav class="navbar navbar-expand-md navbar-dark sticky-top">
    <div class="container">
        <div class="d-flex flex-column">
            <a class="navbar-brand nav-link" href="{{ url('/') }}">
                <img src="{{ url('/assets/images/dy.id@1.1.png') }}" alt="">
            </a>    
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item d-flex flex-row align-items-center">
                    <a class="nav-link" href="{{ route('home')}}"><div class="btn btn-grad-home">🏠 HOME</div></a>
                    @if (Route::is('home') || Route::is('admin.products'))
                            {{-- Show search bar --}}
                        <form class="form-inline my-2 my-lg-0">
                            <button class="btn btn-warning my-2" type="submit">🚀</button>
                            <input class="form-control my-2" type="search" name="q" placeholder="search here..." aria-label="Search">
                        </form>
                    @else
                        {{-- Don't show search bar --}}
                    @endif
                </li>
            </ul>

            @guest
            @else
                @if (Auth::user()->role_id == 1)
                    <h5 class="text-warning">ADMIN CMS APP</h5>
                @endif
            @endguest

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">


                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (Auth::user()->role_id == 1)
                    
                        {{--Manage product drop down menu  --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Manage Product
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.products')}}">
                                    🏙 View Product
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.products.getAddProductPage') }}">
                                    🥧 Add Product
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Manage Category
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.categories')}}">
                                    🌀 View Category
                                </a>
                                <a class="dropdown-item" href="{{route('admin.categories.getAddCategory')}}">
                                    👨‍🔧 Add Category
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   📤 Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> 
                            </div>
                        </li>
                    @else
                    <li>
                        <a class="nav-link" href="{{ route('cart.detail', ['q'=>Crypt::encrypt(Auth::user()->id)]) }}">
                            🛒 My Cart
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('transactions', ['q' => Crypt::encrypt(Auth::user()->id)]) }}">
                            📃 History Transaction
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           📤 Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> 
                    </li>
                    @endif

                    
                @endguest
            </ul>
        </div>
    </div>
</nav>