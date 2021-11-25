<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
      <div class="sidebar-brand-icon">
          <i class="fas fa-school"></i>
      </div>
      <div class="sidebar-brand-text mx-3">{{ config('app.name') }} <sup>0.3</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard')?'active':'' }}">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>{{ __('admin.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      {{ __('admin.management') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs(['admin.users.*','admin.groups.*','admin.permissions.*'])?'active':'' }}">
      <a class="nav-link {{ request()->routeIs(['admin.users.*','admin.groups.*','admin.permissions.*'])?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="{{ request()->routeIs(['admin.users.*','admin.groups.*','admin.permissions.*'])?'true':'false' }}" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-users"></i>
        <span>{{ __('admin.user_management') }}</span>
      </a>
      <div id="collapseTwo" class="collapse {{ request()->routeIs(['admin.users.*','admin.groups.*','admin.permissions.*'])?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.user_management') }}:</h6>
          <a class="collapse-item {{ request()->routeIs('admin.users.index')?'active':'' }}" href="{{ route('admin.users.index') }}">{{ __('admin.list') }}</a>

          <a class="collapse-item {{ request()->routeIs('admin.users.create')?'active':'' }}" href="{{ route('admin.users.create') }}">{{ __('admin.user_create') }}</a>

          <div class="collapse-divider"></div>
          <h6 class="collapse-header">{{ __('admin.user_group') }}:</h6>

          <a class="collapse-item {{ request()->routeIs('admin.groups.index')?'active':'' }}" href="{{ route('admin.groups.index') }}">{{ __('admin.user_group') }}</a>
          
          <a class="collapse-item {{ request()->routeIs('admin.groups.create')?'active':'' }}" href="{{ route('admin.groups.create') }}">{{ __('admin.group_create') }}</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">{{ __('admin.group_permission') }}:</h6>
          <a class="collapse-item {{ request()->routeIs('admin.permissions.index')?'active':'' }}" href="{{ route('admin.permissions.index') }}">{{ __('admin.group_permission') }}</a>
          <a class="collapse-item {{ request()->routeIs('admin.permissions.create')?'active':'' }}" href="{{ route('admin.permissions.create') }}">{{ __('admin.permission_create') }}</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">{{ __('admin.other_task') }}:</h6>
          <a class="collapse-item" href="#">{{ __('admin.send_notification') }}</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-blog"></i>
        <span>{{ __('admin.post') }}</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.post_category') }}:</h6>
          <a class="collapse-item" href="{{ route('admin.categories.index') }}">{{ __('admin.category_list') }}</a>
          <a class="collapse-item" href="{{ route('admin.categories.create') }}">{{ __('admin.category_create') }}</a>

          <h6 class="collapse-header">{{ __('admin.post') }}:</h6>          
          <a class="collapse-item" href="{{ route('admin.posts.index') }}">{{ __('admin.post_list') }}</a>
          <a class="collapse-item" href="{{ route('admin.posts.create') }}">{{ __('admin.post_create') }}</a>
        </div>
      </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
      {{ __('admin.tuyensinh') }}
    </div>

    <!-- Nav Item - Quyết định thi Collapse Menu -->
  
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs(['admin.hocviens.*'])?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseSinhvien" aria-expanded="{{ request()->routeIs(['admin.hocviens.*'])?'true':'false' }}" aria-controls="collapseSinhvien">
        <i class="fas fa-fw fa-users"></i>
        <span>{{ __('admin.qlsinhvien') }}</span>
      </a>
      <div id="collapseSinhvien" class="collapse {{ request()->routeIs(['admin.hocviens.*'])?'show':'' }}" aria-labelledby="headingsinhvien" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.sinhvien') }}:</h6>
          
          <a class="collapse-item {{ request()->routeIs(['admin.hocviens.index'])?'active':'' }}" href="{{ route('admin.hocviens.index') }}">{{ __('admin.list') }}</a>
          <a class="collapse-item {{ request()->routeIs(['admin.hocviens.create'])?'active':'' }}" href="{{ route('admin.hocviens.create') }}">{{ __('admin.create') }}</a>
          <a class="collapse-item {{ request()->routeIs(['admin.hocviens.nhaphv'])?'active':'' }}" href="{{ route('admin.hocviens.nhaphv') }}">{{ __('admin.import') }}</a>
        </div>
      </div>
      <!-- Quản lý lớp học -->
      <a class="nav-link {{ request()->routeIs(['admin.lops.*'])?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseLophoc" aria-expanded="{{ request()->routeIs(['admin.lops.*'])?'true':'false' }}" aria-controls="collapseLophoc">
        <i class="fas fa-fw fa-warehouse"></i>
        <span>{{ __('admin.qllophoc') }}</span>
      </a>
      <div id="collapseLophoc" class="collapse {{ request()->routeIs(['admin.lops.*'])?'show':'' }}" aria-labelledby="headinglophoc" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.lophoc') }}:</h6>
          <a class="collapse-item {{ request()->routeIs(['admin.lops.index'])?'active':'' }}" href="{{ route('admin.lops.index') }}">{{ __('admin.list') }}</a>
          <a class="collapse-item {{ request()->routeIs(['admin.lops.create'])?'active':'' }}" href="{{ route('admin.lops.create') }}">{{ __('admin.create') }}</a>
        </div>
      </div>

      <!-- Quản lý Quyết định trúng tuyển -->
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQDTT" aria-expanded="true" aria-controls="collapseLophoc">
        <i class="fas fa-fw fa-file"></i>
        <span>{{ __('admin.qlqdtt') }}</span>
      </a>
      <div id="collapseQDTT" class="collapse" aria-labelledby="headinglophoc" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.qdtt') }}:</h6>
          <a class="collapse-item" href="{{ route('admin.lops.index') }}">{{ __('admin.list') }}</a>
          <a class="collapse-item" href="{{ route('admin.lops.create') }}">{{ __('admin.create') }}</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
      {{ __('admin.daotao') }}
    </div>

    <!-- Nav Item - Quyết định thi Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLMon" aria-expanded="{{ request()->routeIs(['admin.qdthis.*'])?'true':'false' }}" aria-controls="collapseQLMon">
        <i class="fas fa-fw fa-atlas"></i>
        <span>{{ __('admin.qlmonhoc') }}</span>
      </a>
      <div id="collapseQLMon" class="collapse" aria-labelledby="headingQDThis" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.qlmonhoc') }}:</h6>
          <a class="collapse-item {{ request()->routeIs(['admin.qdthis.index'])?'active':'' }}" href="{{ route('admin.qdthis.index') }}">{{ __('admin.list') }}</a>
          <a class="collapse-item {{ request()->routeIs(['admin.qdthis.create'])?'active':'' }}" href="{{ route('admin.qdthis.create') }}">{{ __('admin.create') }}</a>
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
      {{ __('admin.khaothi') }}
    </div>

    <!-- Nav Item - Quyết định thi Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs(['admin.diems.*'])?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseQLDiem" aria-expanded="true" aria-controls="collapseQLDiem">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>{{ __('admin.qldiem') }}</span>
      </a>
      <div id="collapseQLDiem" class="collapse {{ request()->routeIs(['admin.diems.*'])?'show':'' }}" aria-labelledby="headingQDThis" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item {{ request()->routeIs(['admin.diems.tracuudiem'])?'active':'' }}" href="{{ route('admin.diems.tracuudiem') }}">{{ __('admin.tracuudiem') }}</a>
          <h6 class="collapse-header">{{ __('admin.qldiemelearning') }}:</h6>
          <a class="collapse-item {{ request()->routeIs(['admin.diems.nhapdiem'])?'active':'' }}" href="{{ route('admin.diems.nhapdiem') }}">{{ __('admin.nhapdiemtx') }}</a>
          <a class="collapse-item {{ request()->routeIs(['admin.diems.nhapdiem'])?'active':'' }}" href="{{ route('admin.diems.nhapdiem') }}">{{ __('admin.nhapdiemthi') }}</a>
          <h6 class="collapse-header">{{ __('admin.qldiemtt') }}:</h6>
          <a class="collapse-item {{ request()->routeIs(['admin.diems.nhapdiemtt'])?'active':'' }}" href="{{ route('admin.diems.nhapdiemtt') }}">{{ __('admin.nhapdiemtt') }}</a>
          
        </div>
      </div>

            
      <a class="nav-link {{ request()->routeIs(['admin.qdthis.*'])?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseQDThi" aria-expanded="{{ request()->routeIs(['admin.qdthis.*'])?'true':'false' }}" aria-controls="collapseQDThi">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>{{ __('admin.qlthi') }}</span>
      </a>
      <div id="collapseQDThi" class="collapse {{ request()->routeIs(['admin.qdthis.*'])?'show':'' }}" aria-labelledby="headingQDThis" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">{{ __('admin.qlthi') }}:</h6>
          <a class="collapse-item {{ request()->routeIs(['admin.qdthis.xetdkdtfrm'])?'active':'' }}" href="{{ route('admin.qdthis.xetdkdtfrm') }}">{{ __('admin.xetdkdt') }}</a>
        </div>
      </div>
      
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->