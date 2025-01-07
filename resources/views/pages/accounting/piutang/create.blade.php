<form action="{{ route('piutang.store') }}" method="POST" id="myForm">
    @csrf
    @include('pages.accounting.piutang.form')            
  </form>
  <div id="response_container"></div>
  