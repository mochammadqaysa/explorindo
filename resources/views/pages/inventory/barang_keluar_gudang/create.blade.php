<form action="{{ route('barang-keluar-gudang.store') }}" method="POST" id="myForm">
    @csrf
    @include('pages.inventory.barang_keluar_gudang.form')            
  </form>
  <div id="response_container"></div>
  