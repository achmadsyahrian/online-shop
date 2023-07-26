<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <h3 class="navbar-brand logo_h subscribe__title" href="/">ONLINE SHOP</h3>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item {{ Request::is('shop*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('shop') }}">Shop</a></li>
            </ul>
            <ul class="nav-shop">
              <li class="nav-item ">
                <a href="/cart">
                <button>
                  <i class="ti-shopping-cart"></i>
                  <span class="nav-shop__circle">
                    @php
                        $countCart = session()->get('cart', [])
                    @endphp
                    @if ($countCart)
                        {{ count($countCart) }}
                    @else
                        0
                    @endif
                  </span>
                </button> 
                </a>
              </li>
              <li class="nav-item">
                <a href="/orders">
                <button>
                    <i class="ti-bag"></i>
                </button>
                </a>  
              </li>
            </ul>
            <ul class="nav navbar-nav menu_nav">
              <li class="nav-item submenu dropdown">
                @auth
                    <button type="button" class="button button-header " data-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user mr-2"></i>{{ auth()->user()->username }}
                    </button>
                    <ul class="dropdown-menu mt-3">
                      @php
                          $hasOutlet = \App\Models\Outlet::where('user_id', auth()->user()->id)->exists();
                      @endphp
                      @if (auth()->user()->role == "toko" && $hasOutlet)
                          <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="fa-solid fa-user-gear"></i> My Dashboard</a></li>
                      @elseif(auth()->user()->role == "toko")
                          <li class="nav-item"><a class="nav-link" href="/create-outlet"><i class="fa-solid fa-store"></i> Create Outlet</a></li>
                      @endif
                      <li class="nav-item">
                        <form action="/logout" method="POST">
                          @csrf
                          <a class="nav-link">
                            <button class="btn btn-link text-dark" ><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                          </a>
                        </form>
                      </li>
                    </ul>
                @else
                    <a href="/login" class="button button-header">
                      <i class="fa-solid fa-user mr-2"></i>Login
                    </a>
                @endauth
							</li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>