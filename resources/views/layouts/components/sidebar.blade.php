@php
$links = [
    [
        "href" => route('home'),
        "text" => "Dasboard",
        "icon" => "fas fa-home",
        "is_multi" => false
    ],
    [
        "text" => __('adminlte/sidebar.button.manage_account'),
        "icon" => "fas fa-users",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => __('adminlte/sidebar.button.account_data'),
                "section_icon" => "far fa-circle",
                "section_href" => route('account.index')
            ],
            [
                "section_text" => __('adminlte/sidebar.button.add_account'),
                "section_icon" => "far fa-circle",
                "section_href" => route('account.add')
            ]
        ]
    ],
    [
        "text" => __('adminlte/sidebar.button.manage_jobs'),
        "icon" => "fas fa-tasks",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => __('adminlte/sidebar.button.list_jobs'),
                "section_icon" => "far fa-circle",
                "section_href" => route('jobs.job.index')
            ],
            [
                "section_text" => __('adminlte/sidebar.button.add_job'),
                "section_icon" => "far fa-circle",
                "section_href" => route('jobs.job.create')
            ]
        ]
    ],
    [
        "text" => __('adminlte/sidebar.button.manage_job_types'),
        "icon" => "fas fa-tasks",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => __('adminlte/sidebar.button.list_job_types'),
                "section_icon" => "far fa-circle",
                "section_href" => route('job_types.job_type.index')
            ],
            [
                "section_text" => __('adminlte/sidebar.button.add_job_type'),
                "section_icon" => "far fa-circle",
                "section_href" => route('job_types.job_type.create')
            ]
        ]
    ],
    [
        "text" => __('adminlte/sidebar.button.manage_job_statuses'),
        "icon" => "fas fa-tasks",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => __('adminlte/sidebar.button.list_job_statuses'),
                "section_icon" => "far fa-circle",
                "section_href" => route('job_statuses.job_status.index')
            ],
            [
                "section_text" => __('adminlte/sidebar.button.add_job_status'),
                "section_icon" => "far fa-circle",
                "section_href" => route('job_statuses.job_status.create')
            ]
        ]
    ]
];
$navigation_links = json_decode(json_encode($links));
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('vendor/adminlte3/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @foreach ($navigation_links as $link)

            @if (!$link->is_multi)
            <li class="nav-item">
            <a href="{{ (url()->current() == $link->href) ? '#' : $link->href }}" class="nav-link {{ (url()->current() == $link->href) ? 'active' : '' }}">
              <i class="nav-icon {{ $link->icon }}"></i>
              <p>
                {{ $link->text }}
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
            </li>
            @else
            @php
                foreach($link->href as $section){
                    if (url()->current() == $section->section_href) {
                        $open = 'menu-open';
                        $status = 'active';
                        break; // Put this here
                    } else {
                        $open ='';
                        $status = '';
                    }
                }
            @endphp
            <li class="nav-item {{$open}}">
            <a href="#" class="nav-link {{$status}}">
                <i class="nav-icon {{ $link->icon }}"></i>
                <p>
                  {{ $link->text }}
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($link->href as $section)
                <li class="nav-item">
                  <a href="{{ (url()->current() == $section->section_href) ? '#' : $section->section_href }}" class="nav-link {{ (url()->current() == $section->section_href) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $section->section_text }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif

        @endforeach
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
