<form action="{{ route('piutang.pelunasan.store', $uid) }}" method="POST" id="myForm">
    @csrf
    @include('pages.accounting.pelunasan.form')            
</form>
<div id="response_container"></div>
  