<form action="{{ route('barang-keluar.generate-reminder', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.inventory.barang_keluar.form_reminder')            
  </form>
  <div id="response_container"></div>