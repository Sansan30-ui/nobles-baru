<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html"><img width="100" src="{{ asset('admin') }}/img/nobleseed.png"
                        alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <ul class="navbar-nav">

                            <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
                                <a class="nav-link" href="/produk">Products<span class="sr-only">(current)</span></a>
                            </li>
                            @if (Request::is('produk'))
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('home') }}#about">About</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                            @endif
                            @if (Request::is('contact'))
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('home') }}#contact">Contact</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">contact</a>
                                </li>
                            @endif

                            @if (auth()->user())
                                <li class="">
                                    <a class="nav-link" href="/cart/{{ auth()->user()->id }}"
                                        style="display: flex; justify-content:center;">
                                        <i class="fa fa-shopping-cart fa-lg mr-2" aria-hidden="true"
                                            style="color: white"></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown show">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="true"> <span
                                            class="nav-label">
                                            <i class="fa fa-user fa-lg mr-2"></i>
                                            <span class="caret">{{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if (auth()->user()->role == 'admin')
                                            <li><a href="/dashboard" class="dropdown-item">Dashboard</a></li>
                                        @else
                                            <li><a href="/profile" class="dropdown-item">Profil</a></li>
                                            <li><a href="/pesanan" class="dropdown-item">Pesanan Saya</a></li>
                                        @endif
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <li><button type="submit" class="dropdown-item">Logout</a></li>
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                                    <a class="nav-link" href="/login">login <span class="sr-only">(current)</span></a>
                                </li>
                            @endif


                        </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
