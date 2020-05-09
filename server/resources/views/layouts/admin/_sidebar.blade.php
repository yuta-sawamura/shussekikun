<div class="sidebar-wrapper sidebar-theme">
  <nav id="sidebar">
    <ul class="navbar-nav theme-brand flex-row  text-center">
      <li class="nav-item theme-logo">
        <a href="{{ url('/admin/user/aggregate') }}">
          <img class="navbar-logo" alt="logo" src="{{ asset('/img/logo.png') }}">
        </a>
      </li>
      <li class="nav-item theme-text">
        <a href="{{ url('/admin/user/aggregate') }}" class="nav-link"> SHUSSEKIKUN </a>
      </li>
    </ul>
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu active">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span>ダッシュボード</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
          <li>
            <a href="{{ url('admin/user/show') }}"> マイページ </a>
          </li>
          <li>
            <a href="{{ url('user/login') }}"> ログアウト </a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="{{ url('admin/user/aggregate') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
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
      <li class="menu">
        <a href="{{ url('admin/class') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="12" y1="8" x2="12" y2="16"></line>
              <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            <span class="badge badge-success"></span>
            <span>クラス</span>
          </div>
        </a>
      </li>
      <li class="menu">
        <a href="{{ url('admin/store') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span class="badge badge-success"></span>
            <span>店舗</span>
          </div>
        </a>
      </li>
      <li class="menu">
        <a href="{{ url('admin/category') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <span class="badge badge-success"></span>
            <span>カテゴリー</span>
          </div>
        </a>
      </li>
      <li class="menu">
        <a href="{{ url('admin/news/') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="badge badge-success"></span>
            <span>お知らせ</span>
          </div>
        </a>
      </li>
      <li class="menu">
      <li class="menu">
        <a href="{{ url('admin/premium') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-up">
              <polyline points="10 9 15 4 20 9"></polyline>
              <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
            </svg>
            <span class="badge badge-success"></span>
            <span>プレミアム会員</span>
          </div>
        </a>
      </li>
      </li>
      <li class="menu">
        <a href="{{ url('/') }}" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            <span class="badge badge-success"></span>
            <span>会員画面</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>
</div>
