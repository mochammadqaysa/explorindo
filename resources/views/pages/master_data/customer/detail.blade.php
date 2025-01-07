@php
use App\Helpers\Utils;
@endphp
<style>
  td h3 {
      word-wrap: break-word; /* Ensures long words wrap to the next line */
      white-space: normal; /* Allows wrapping for multiple lines of text */
      max-width: 300px;
      min-width: 300px;
  }
</style>
<div class="card shadow">
  <div class="card-body">
    <div class="row">
      <div class="col-md-2">
          <img src="{{ asset('img/default-avatar.png')}}" class="rounded" style="width: 100px; height:100px;" alt="circle-picture">
      </div>
      <table class="table table-borderless align-items-left table-flush table-header col-md-8">
        <tbody>
          <tr>
            <td>
              Nama Customer
              <h3>{{ @$customer->nama }} <span class="badge {{ @$customer->tipe == "ekspor" ? "bg-info" : "bg-primary" }}  text-white">{{ @$customer->tipe }}</span></h3>
            </td>
            <td>
              Email
              <h3>{{ @$customer->email ?? '-' }}</h3>
            </td>
          </tr>
          <tr>
            <td>
                Alamat
                <h3>{{ @$customer->alamat ?? '-' }}</h3>
            </td>
            <td>
              Nomor Telpon
              <h3>{{ @$customer->no_telpon ?? '-' }}</h3>
            </td>
          </tr>
          <tr>
            <td>
              Negara
              <h3>{{ @$customer->negara ?? '-' }}</h3>
            </td>
            <td>
              Person In Charge
              <h3>{{ @$customer->pic ?? '-' }}</h3>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>