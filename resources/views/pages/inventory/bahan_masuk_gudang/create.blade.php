<form action="{{ route('bahan-masuk-gudang.store') }}" method="POST" id="myForm">
    @csrf
    @include('pages.inventory.bahan_masuk_gudang.form')            
  </form>
  <div id="response_container"></div>
  