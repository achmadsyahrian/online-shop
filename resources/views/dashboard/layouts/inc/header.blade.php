<header class="app-header">
   <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
         <a class="nav-link sidebartoggler nav-icon-hover" style="margin-left:-20px;" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2" ></i>
         </a>
      </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
         <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('p_dashboard/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body text-center">
               <form action="/logout" method="POST">
                  @csrf
                  <a href="/" class="d-flex align-items-center gap-2 dropdown-item mb-2">
                     <i class="ti ti-home fs-6"></i><p class="mb-0 fs-3">Back to Home</p>
                  </a>
                  <button class="btn btn-outline-primary " style="width: 80%;">Logout</button>
               </form>
            </div>
            </div>
         </li>
      </ul>
      </div>
   </nav>
</header>