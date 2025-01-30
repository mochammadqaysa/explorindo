<form action="{{ route('tour.update', $uid) }}" method="POST" id="myForm">
    @csrf
    @method('PUT')
    @include('pages.master_data.place.form')            
  </form>
  <div id="response_container"></div>