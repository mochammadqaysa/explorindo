@php
use App\Helpers\Utils;
@endphp
<style>
  td h4 {
      word-wrap: break-word; /* Ensures long words wrap to the next line */
      white-space: normal; /* Allows wrapping for multiple lines of text */
  }
</style>
<div class="row">
  <table class="table table-borderless align-items-left table-flush table-header col-md-6">
    <tbody>
      <tr>
        <td>
          Nomor Surat Jalan
          <h4>{{ @$piutang->nomor_sj }}</h4>
        </td>
        <td>
          Tanggal Surat Jalan
          <h4>{{ Utils::formatTanggalLaporan(@$piutang->tanggal_sj) }}</h4>
        </td>
      </tr>
      <tr>
        <td>
          Tanggal Barang Diterima
          <h4>{{ Utils::formatTanggalLaporan(@$piutang->tanggal_received) }}</h4>
        </td>
      </tr>
      <tr>
        <td>
          Nama Pelanggan
          <h4>{{ @$piutang->barangKeluar->customer->nama }}</h4>
        </td>
        <td>
          Alamat 
          <h4>{{ @$piutang->barangKeluar->customer->alamat }}</h4>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table table-borderless align-items-left table-flush table-header col-md-6">
    <tbody>
      <tr>
        <td>
          Nominal Piutang
          <h4>{!! Utils::decimal(@$piutang->barangKeluar->barangKeluarItems->sum('nilai_total') ?? 0, 3) !!}</h4>
        </td>
      </tr>
      <tr>
        <td>
          Nominal Sudah Dibayar
          <h4>{!! Utils::decimal(@$nominal_bayar ?? 0, 3) !!}</h4>
        </td>
      </tr>
      <tr>
        <td>
          Sisa Piutang
          <h4>{!! Utils::decimal(@$piutang->barangKeluar->barangKeluarItems->sum('nilai_total') - @$nominal_bayar ?? 0 , 3) !!}</h4>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label>Nomor pelunasan <span class="text-danger">*</span></label>
        <input type="text" name="nomor_pelunasan" class="form-control" style="text-transform: uppercase" placeholder="Nomor Pelunasan" >
        <div id="validate_nomor_pelunasan" class="invalid-feedback"></div>
    </div>
    <div class="form-group col-md-6 ">
      <label>Tanggal Bayar <span class="text-danger">*</span></label>
      <div class="date">
        <input type='text' class="form-control" name="tanggal_bayar" id='tanggal_bayar' style="background-color: white; " placeholder="Pilih Tanggal Bayar" >
      </div>
      <span id="validate_tanggal_bayar" class="text-sm" style="color: #fb6340;"></span>
    </div>
    <div class="form-group col-md-12">
      <label>Nominal Bayar <span class="text-danger">*</span></label>
      <input type="number" step=".01" name="nominal_bayar" class="form-control" placeholder="Nominal Bayar" >
      <div id="validate_nominal_bayar" class="invalid-feedback"></div>
    </div>
</div>
<script>
  function parseFixed(form, zero) {
    var kursValue = form.val(); // Get the input value
    var kursFloat = parseFloat(kursValue); // Convert to float
    if (isNaN(kursFloat)) {
      $(this).val(''); // Optionally clear the input if it's not a valid number
    } else {
      form.val(kursFloat.toFixed(zero) || ''); // Use an empty string if it's NaN
    }
  }
  $(document).on('blur', 'input[name="nominal_bayar"]', function () {
      parseFixed($(this),3);
  });
  $(() => {
    $('#tanggal_bayar').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
  })
</script>
  