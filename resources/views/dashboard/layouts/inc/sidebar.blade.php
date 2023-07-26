<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center ms-1 justify-content-between">
          <div class="logo-container">
              <h2 class="text-nowrap logo-img mb-0">{{ auth()->user()->outlet->name }}</h2>
          </div>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
          </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('/dashboard') ? 'active' : '' }}" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-home-cog"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">OUTLET</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">My Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories" aria-expanded="false">
                <span>
                  <i class="ti ti-category"></i>
                </span>
                <span class="hide-menu">Categories Product</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Transaction</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('dashboard/transaction/new*') ? 'active' : '' }}" href="/dashboard/transaction/new" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart-plus"></i>
                </span>
                <span class="hide-menu">New Transaction</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('dashboard/transaction/completed*') ? 'active' : '' }}" href="/dashboard/transaction/completed" aria-expanded="false">
                <span>
                  <i class="ti ti-discount-check"></i>
                </span>
                <span class="hide-menu">Completed</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('dashboard/transaction/rejected*') ? 'active' : '' }}" href="/dashboard/transaction/rejected" aria-expanded="false">
                <span>
                  <i class="ti ti-ban"></i>
                </span>
                <span class="hide-menu">Rejected</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>