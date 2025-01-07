<style>
  
</style>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">

  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand">
        <img src="{{ asset('argon2/assets/img/logo.png') }}" class="navbar-brand-img" alt="..."
          style="max-height: 2rem !important;">
        <span class="text-sm font-weight-bold">PT. Tiara Indoprima</span><br>
        
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
      ->item('Dashboard', 'ni ni-tv-2', 'inventory/dashboard', Request::is('inventory/dashboard'), "dashboard.view")
      ->end_group();

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Master Data','master',["bahan_baku.list", "barang_jadi.list"],'fas fa-database')
      ->start_item_accordion('master', (
      Request::is('inventory/bahan') ||
      Request::is('inventory/barang') ||
      Request::is('inventory/jenis-waste') ||
      Request::is('inventory/waste') ||
      Request::is('inventory/supplier') ||
      Request::is('inventory/customer') ||
      Request::is('inventory/gudang') ||
      Request::is('inventory/bagian')
      ))
      ->item('Bahan Baku', 'fas fa-cube', 'inventory/bahan', Request::is('inventory/bahan'), "bahan_baku.list")
      ->item('Barang Jadi', 'fas fa-box-open', 'inventory/barang', Request::is('inventory/barang'), "barang_jadi.list")
      ->item('Jenis Waste', 'fas fa-biohazard', 'inventory/jenis-waste', Request::is('inventory/jenis-waste'), "jenis_waste.list")
      ->item('Waste', 'fas fa-dumpster', 'inventory/waste', Request::is('inventory/waste'),"waste.list")
      ->item('Supplier', 'fas fa-parachute-box', 'inventory/supplier', Request::is('inventory/supplier'), "supplier.list")
      ->item('Customer', 'fas fa-address-card', 'inventory/customer', Request::is('inventory/customer'), "customer.list")
      ->item('Gudang', 'fas fa-warehouse', 'inventory/gudang', Request::is('inventory/gudang'), "gudang.list")
      ->item('Bagian', 'fas fa-people-carry', 'inventory/bagian', Request::is('inventory/bagian'), "bagian.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();


      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Inventory','inventory',["bahan_masuk.list", "bahan_keluar.list", "barang_masuk.list", "barang_keluar.list", "waste_masuk.list", "waste_keluar.list","bahan_masuk_gudang.list","barang_keluar_gudang.list"],'fas fa-truck-loading')
      ->start_item_accordion('inventory', (
        Request::is('inventory/bahan-masuk') ||
        Request::is('inventory/bahan-masuk-gudang') ||
        Request::is('inventory/bahan-keluar') ||
        Request::is('inventory/barang-masuk') ||
        Request::is('inventory/barang-keluar') ||
        Request::is('inventory/barang-keluar-gudang') ||
        Request::is('inventory/waste-masuk') ||
        Request::is('inventory/waste-keluar') 
        ))
      ->customIconItem('Pemasukan Bahan Baku', asset('assets/img/brand/import_bahan.svg'), 'inventory/bahan-masuk',Request::is('inventory/bahan-masuk'), "bahan_masuk.list")
      ->customIconItem('Pemasukan Bahan Baku', asset('assets/img/brand/import_bahan.svg'), 'inventory/bahan-masuk-gudang',Request::is('inventory/bahan-masuk-gudang'), "bahan_masuk_gudang.list")
      ->customIconItem('Pengeluaran Bahan Baku', asset('assets/img/brand/export_bahan.svg'), 'inventory/bahan-keluar',Request::is('inventory/bahan-keluar'), "bahan_keluar.list")
      ->customIconItem('Pemasukan Barang Jadi', asset('assets/img/brand/import_barang.svg'), 'inventory/barang-masuk',Request::is('inventory/barang-masuk'), "barang_masuk.list")
      ->customIconItem('Pengeluaran Barang Jadi', asset('assets/img/brand/export_barang.svg'), 'inventory/barang-keluar',Request::is('inventory/barang-keluar'), "barang_keluar.list")
      ->customIconItem('Pengeluaran Barang Jadi', asset('assets/img/brand/export_barang.svg'), 'inventory/barang-keluar-gudang',Request::is('inventory/barang-keluar-gudang'), "barang_keluar_gudang.list")
      ->customIconItem('Pemasukan Waste / Scrap', asset('assets/img/brand/import_waste.svg'), 'inventory/waste-masuk',Request::is('inventory/waste-masuk'), "waste_masuk.list")
      ->customIconItem('Pengeluaran Waste / Scrap', asset('assets/img/brand/export_waste.svg'), 'inventory/waste-keluar',Request::is('inventory/waste-keluar'), "waste_keluar.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      
      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Accounting','accounting',["piutang.list"],'fas fa-balance-scale')
      ->start_item_accordion('accounting', (Request::is('inventory/piutang')))
      ->item('Jurnal', 'fas fa-comment-dollar', 'inventory/piutang', Request::is('inventory/piutang'),"piutang.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Laporan','reporting',[
        "report.bahan_masuk.view",
        "report.bahan_keluar.view",
        "report.pdb.view",
        "report.barang_masuk.view",
        "report.barang_keluar.view",
        "report.waste_masuk.view",
        "report.waste_keluar.view",
        "report.mutasi_bahan.view",
        "report.mutasi_barang.view",
        "report.stok_bahan.view",
        "report.stok_barang.view",
      ],'ni ni-archive-2')
      ->start_item_accordion('reporting', (
        Request::is('inventory/report/bahan-masuk') ||
        Request::is('inventory/report/bahan-keluar') ||
        Request::is('inventory/report/bdp') ||
        Request::is('inventory/report/barang-masuk') ||
        Request::is('inventory/report/barang-keluar') ||
        Request::is('inventory/report/waste-masuk') ||
        Request::is('inventory/report/waste-keluar') ||
        Request::is('inventory/report/mutasi-bahan') ||
        Request::is('inventory/report/mutasi-barang') ||
        Request::is('inventory/report/stok-bahan') ||
        Request::is('inventory/report/stok-barang') ||
        Request::is('inventory/report/bahan-masuk-gudang') || 
        Request::is('inventory/report/barang-keluar-gudang')
        ))
      ->customIconItem('Pemasukan Bahan Baku', asset('assets/img/brand/file-bahan.svg'), 'inventory/report/bahan-masuk', Request::is('inventory/report/bahan-masuk'), "report.bahan_masuk.view")
      ->customIconItem('Pemasukan Bahan Baku', asset('assets/img/brand/file-bahan.svg'), 'inventory/report/bahan-masuk-gudang', Request::is('inventory/report/bahan-masuk-gudang'), "report.bahan_masuk_gudang.view")
      ->customIconItem('Pengeluaran Bahan Baku', asset('assets/img/brand/file-bahan.svg'), 'inventory/report/bahan-keluar', Request::is('inventory/report/bahan-keluar'), "report.bahan_keluar.view")
      ->customIconItem('Pemakaian Barang Dalam Proses', asset('assets/img/brand/pemakaian-barang.svg'), 'inventory/report/bdp', Request::is('inventory/report/bdp'), "report.pdb.view")
      ->customIconItem('Pemasukan Barang Jadi', asset('assets/img/brand/file-barang.svg'), 'inventory/report/barang-masuk', Request::is('inventory/report/barang-masuk'), "report.barang_masuk.view")
      ->customIconItem('Pengeluaran Barang Jadi', asset('assets/img/brand/file-barang.svg'), 'inventory/report/barang-keluar', Request::is('inventory/report/barang-keluar'), "report.barang_keluar.view")
      ->customIconItem('Pengeluaran Barang Jadi', asset('assets/img/brand/file-barang.svg'), 'inventory/report/barang-keluar-gudang', Request::is('inventory/report/barang-keluar-gudang'), "report.barang_keluar_gudang.view")
      ->customIconItem('Pemasukan Waste / Scrap', asset('assets/img/brand/file-waste.svg'), 'inventory/report/waste-masuk', Request::is('inventory/report/waste-masuk'), "report.waste_masuk.view")
      ->customIconItem('Pengeluaran Waste / Scrap', asset('assets/img/brand/file-waste.svg'), 'inventory/report/waste-keluar', Request::is('inventory/report/waste-keluar'), "report.waste_keluar.view")
      ->customIconItem('Mutasi Bahan Baku', asset('assets/img/brand/file-mutasi.svg'), 'inventory/report/mutasi-bahan', Request::is('inventory/report/mutasi-bahan'), "report.mutasi_bahan.view")
      ->customIconItem('Mutasi Barang Jadi', asset('assets/img/brand/file-mutasi.svg'), 'inventory/report/mutasi-barang', Request::is('inventory/report/mutasi-barang'), "report.mutasi_barang.view")
      ->customIconItem('Stok Bahan Baku', asset('assets/img/brand/file-stokbahan.svg'), 'inventory/report/stok-bahan', Request::is('inventory/report/stok-bahan'), "report.stok_bahan.view")
      ->customIconItem('Stok Barang Jadi', asset('assets/img/brand/file-stokbarang.svg'), 'inventory/report/stok-barang', Request::is('inventory/report/stok-barang'), "report.stok_barang.view")
      ->customIconItem('Umur Piutang', asset('assets/img/brand/file-accounting.svg'), 'inventory/report/umur-piutang', Request::is('inventory/report/umur-piutang'), "report.stok_barang.view")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Manajemen Data','data-management',["backup_data.backup"],'fas fa-server')
      ->start_item_accordion('data-management', (Request::is('inventory/backup-data')))
      ->item('Backup Data', 'fas fa-digital-tachograph', 'inventory/backup-data', Request::is('inventory/backup-data'),"backup_data.backup")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();


      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Manajemen User','user-management',["module.list", "role.list", "user.list"], 'ni ni-badge')
      ->start_item_accordion('user-management', (
        Request::is('inventory/module') ||
      Request::is('inventory/user') ||
      Request::is('inventory/role') ||
      Request::is('inventory/permission') ||
      Request::is('inventory/role/permission/*')
      ))
      ->item('Manage Module', 'fas fa-project-diagram', 'inventory/module', (Request::is('inventory/module') || Request::is('inventory/permission')) , "module.list")
      ->item('Manage Role', 'fas fa-user-astronaut', 'inventory/role', (Request::is('inventory/role') || Request::is('inventory/role/permission/*')), "role.list")
      ->item('Manage User', 'ni ni-circle-08', 'inventory/user', Request::is('inventory/user'), "user.list")
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      $obj_menu->start_group()
      ->start_accordion()
      ->sub_item_accordion('Settings','settings',["profile.view","log.list"], 'fas fa-cogs')
      ->start_item_accordion('settings', (
      Request::is('inventory/profile') ||
      Request::is('inventory/log') 
      ))
      ->item('Profile', 'fas fa-id-badge', 'inventory/profile', Request::is('inventory/profile'),"profile.view")
      ->item('Log', 'fas fa-user-clock', 'inventory/log', Request::is('inventory/log'),"log.list")
      // ->item('Change Password', 'fas fa-key', 'inventory/user', Request::is('inventory/user'),['super_admin'])
      ->end_item_accordion()
      ->end_accordion()
      ->end_group();

      $menu = $obj_menu->to_html();
      @endphp
      {!! $menu !!}
    </div>
  </div>
</nav>