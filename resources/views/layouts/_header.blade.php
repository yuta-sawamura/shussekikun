<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </a>
    <ul class="navbar-item flex-row navbar-title">
      <li class="nav-item align-self-center page-heading">
        <div class="page-header">
          <div class="page-title">
            <h3>{{ \Auth::user()->store->name ?? null }}</h3>
          </div>
        </div>
      </li>
    </ul>
    <ul class="navbar-item flex-row navbar-dropdown">
      <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </a>
        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
          <div class="">
            <div class="dropdown-item">
              <a href="{{ url('user/show/' . Auth::id()) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg> マイページ
              </a>
            </div>
            <div class="dropdown-item">
              <a href="#" onclick="submitLogout()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg> ログアウト
              </a>
            </div>
            <form method="post" name="header_logout" action="{{ route('logout') }}" id="logout">
              @csrf
              <input type="hidden" name="logout" value="">
            </form>
          </div>
        </div>
      </li>
    </ul>
  </header>
</div>
