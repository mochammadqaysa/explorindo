<form action="{{ route('barang-keluar-gudang.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.inventory.barang_keluar_gudang.form_edit')            
  </form>
  <div id="response_container"></div>