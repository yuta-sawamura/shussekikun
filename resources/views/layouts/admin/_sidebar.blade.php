<div class="sidebar-wrapper sidebar-theme">
  <nav id="sidebar">
    <ul class="navbar-nav theme-brand flex-row  text-center">
      <li class="nav-item theme-logo">
        <a href="{{ url('/admin') }}">
          <img class="navbar-logo" alt="logo" src="{{ asset('/img/logo.png') }}">
        </a>
      </li>
      <li class="nav-item theme-text">
        <a href="{{ url('/admin') }}" class="nav-link"> SHUSSEKIKUN </a>
      </li>
    </ul>
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu {{ request()->route()->uri == 'admin' ? 'active': null }}">
        <a href="{{ url('admin/') }}" aria-expanded="{{ request()->route()->uri == 'admin' ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
              <line x1="18" y1="20" x2="18" y2="10"></line>
              <line x1="12" y1="20" x2="12" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
            <span>ホーム</span>
          </div>
        </a>
      </li>
      <li class="menu {{ strpos(url()->current(), 'user') == true ? 'active': null }}">
        <a href="{{ url('admin/user/') }}" aria-expanded="{{ strpos(url()->current(), 'user') == true ? 'true': 'false' }}" class="dropdown-toggle">
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
      <li class="menu {{ strpos(url()->current(), 'premium') == true ? 'active': null }}">
        <a href="{{ url('admin/premium') }}" aria-expanded="{{ strpos(url()->current(), 'premium') == true ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-up">
              <polyline points="10 9 15 4 20 9"></polyline>
              <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
            </svg>
            <span class="badge badge-success"></span>
            <span>プレミアム会員</span>
          </div>
        </a>
      </li>
      <li class="menu {{ strpos(url()->current(), 'news') == true ? 'active': null }}">
        <a href="{{ url('admin/news/') }}" aria-expanded="{{ strpos(url()->current(), 'news') == true ? 'true': 'false' }}" class="dropdown-toggle">
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

      @php
      $array = ['admin/store', 'admin/category', 'admin/class', 'admin/schedule'];
      @endphp
      <li class="menu {{ in_array(request()->route()->uri, $array) ? 'active': null }}">
        <a href="#datatables" data-toggle="collapse" aria-expanded="{{ in_array(request()->route()->uri, $array) ? 'true': 'false' }}" class="dropdown-toggle">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
              <circle cx="12" cy="12" r="3"></circle>
              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
            <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">設定</font></font></span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </div>
        </a>
        <ul class="{{ in_array(request()->route()->uri, $array) ? 'submenu list-unstyled collapse show': 'collapse submenu list-unstyled' }}" id="datatables" data-parent="#accordionExample">
          <li class="{{ strpos(url()->current(), 'store') == true ? 'active': null }}">
            <a href="{{ url('admin/store') }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">店舗</font></font></a>
          </li>
          <li class="{{ strpos(url()->current(), 'category') == true ? 'active': null }}">
            <a href="{{ url('admin/category') }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">カテゴリー</font></font></a>
          </li>
          <li class="{{ strpos(url()->current(), 'class') == true ? 'active': null }}">
            <a href="{{ url('admin/class') }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">クラス</font></font></a>
          </li>
          <li class="{{ strpos(url()->current(), 'schedule') == true ? 'active': null }}">
            <a href="{{ url('admin/schedule') }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></a>
          </li>
        </ul>
      </li>
      <li class="menu mt-5">
        <a href="{{ url('/') }}" aria-expanded="false" class="dropdown-toggle">
          <div>
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
