<form action="{{ route('bahan-masuk-gudang.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.inventory.bahan_masuk_gudang.form_edit')            
  </form>
  <div id="response_container"></div>