<div class="sidebar-wrapper sidebar-theme">
  <nav id="sidebar">
    <ul class="navbar-nav theme-brand flex-row  text-center">
      <li class="nav-item theme-logo">
        <a href="{{ url('/') }}">
          <img class="navbar-logo" alt="logo" src="{{ asset('/img/logo.png') }}">
        </a>
      </li>
      <li class="nav-item theme-text">
        <a href="{{ url('/') }}" class="nav-link"> SHUSSEKIKUN </a>
      </li>
      <li class="nav-item toggle-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left sidebarCollapse"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
      </li>
    </ul>

    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>{{ \Auth::user()->store->name ?? null }}</span></div>
      </li>
      <li class="menu {{ request()->route()->uri == '/' ? 'active': null }}">
        <a href="{{ url('/') }}" aria-expanded="{{ request()->route()->uri == '/' ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span>出席</span>
          </div>
        </a>
      </li>
      <li class="menu {{ strpos(url()->current(), 'rank') == true ? 'active': null }}">
        <a href="{{ url('rank') }}" aria-expanded="{{ strpos(url()->current(), 'rank') == true ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
              <line x1="18" y1="20" x2="18" y2="10"></line>
              <line x1="12" y1="20" x2="12" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
            <span>ランキング</span>
          </div>
        </a>
      </li>
      <li class="menu {{ strpos(url()->current(), 'user') == true ? 'active': null }}">
        <a href="{{ url('user/') }}" aria-expanded="{{ strpos(url()->current(), 'user') == true ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            <span>会員</span>
          </div>
        </a>
      </li>
      <li class="menu {{ strpos(url()->current(), 'news') == true ? 'active': null }}">
        <a href="{{ url('news/') }}" aria-expanded="{{ strpos(url()->current(), 'news') == true ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="badge badge-success"></span>
            <span>お知らせ</span>
          </div>
        </a>
      </li>
      @can('organization-admin-higher')
        <li class="menu mt-5">
          <a href="{{ url('admin/') }}" aria-expanded="false" class="dropdown-toggle">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
              </svg>
              <span class="badge badge-success"></span>
              <span>管理画面</span>
            </div>
          </a>
        </li>
      @endcan
    </ul>
  </nav>
</div>
