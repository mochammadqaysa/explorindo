<style>
  
</style>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">

  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand">
        <img src="{{asset('front/images/logo-icon.svg')}}" class="navbar-brand-img" alt="..."
          style="max-height: 2rem !important;">
        <span class="text-sm font-weight-bold">Explorindo</span><br>
        
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      @php
      use App\Helpers\Menu;
      use App\Helpers\AuthCommon;
      $menu = '';
      // $role = session('role_permit');
      $permission = session('slug_permit');

      // dd($permission);

      $obj_menu = new Menu();
      $obj_menu->setPermission($permission);
      $obj_menu->init()
      ->start_group()
      ->item('Dashboard', 'ni ni-tv-2', 'admin/dashboard', Request::is('admin/dashboard'), "dashboard.view")
      ->end_group();

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Master Data','master',["tour.list"],'fas fa-database')
      ->start_item_accordion('master', (
      Request::is('admin/tour') 
      ))
      ->item('Tour', 'fas fa-suitcase-rolling', 'admin/tour', Request::is('admin/tour'), "tour.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      
      // $obj_menu->start_group()
      // ->start_accordion()
      // ->sub_item_accordion('Transaksi','settings',["profile.view","log.list"], 'fas fa-cash-register')
      // ->start_item_accordion('settings', (
      // Request::is('inventory/profile') ||
      // Request::is('inventory/log') 
      // ))
      // ->item('Order', 'fas fa-id-badge', 'inventory/profile', Request::is('inventory/profile'),"profile.view")
      // ->end_item_accordion()
      // ->end_accordion()
      // ->end_group();


      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Manajemen User','user-management',["module.list", "role.list", "user.list"], 'ni ni-badge')
      ->start_item_accordion('user-management', (
        Request::is('admin/module') ||
      Request::is('admin/user') ||
      Request::is('admin/role') ||
      Request::is('admin/permission') ||
      Request::is('admin/role/permission/*')
      ))
      ->item('Manage Module', 'fas fa-project-diagram', 'admin/module', (Request::is('admin/module') || Request::is('admin/permission')) , "module.list")
      ->item('Manage Role', 'fas fa-user-astronaut', 'admin/role', (Request::is('admin/role') || Request::is('admin/role/permission/*')), "role.list")
      ->item('Manage User', 'ni ni-circle-08', 'admin/user', Request::is('admin/user'), "user.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();


      $menu = $obj_menu->to_html();
      @endphp
      {!! $menu !!}
    </div>
  </div>
</nav>