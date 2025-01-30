<form action="{{ route('tour.store') }}" method="POST" id="myForm">
    @csrf
    @include('pages.master_data.place.form')            
  </form>
  <div id="response_container"></div>
  