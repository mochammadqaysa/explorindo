
@php
use App\Helpers\Utils;
@endphp
<div class="card shadow">
  <div class="card-body">
    <h3 class="card-title">Data Pelanggan</h3>
    <hr>
    <table class="table table-borderless align-items-left table-flush table-header col-md-6">
      <tbody>
        <tr>
          <td>Nama Pelanggan</td>
          <td>:</td>
          <td class="font-weight-bold">{{ $barangKeluar->customer->nama }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td class="font-weight-bold">{{ $barangKeluar->customer->alamat }}</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered table-success table-striped mt-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Netto</th>
                <th>Nilai</th>
                @if (@$barangKeluar->tipe == "lokal")
                <th>PPN</th>
                @endif
            </tr>
        </thead>
        <tbody>
          @php
            $items = $barangKeluar->barangKeluarItems;   
            $totalJumlah = 0;
            $totalNetto = 0;
            $totalNilai = 0;
          @endphp
          @foreach ($items as $item)
            @php
              $totalJumlah += $item->jumlah;
              $totalNetto += $item->netto;
              $totalNilai += $item->nilai;
            @endphp
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->barang->nama }} {{ $item->barang->warna }} {{ $item->barang->panjang }} x {{ $item->barang->lebar }} x {{ $item->barang->tebal }}</td>
              <td>{{ $item->jumlah }} {{$item->barang->satuan}}</td>
              <td>{!! Utils::decimal($item->netto ?? 0, 3); !!} KG</td>
              <td>{{ $item->mata_uang }} {!! Utils::decimal($item->nilai ?? 0, 2); !!} </td>
              @if (@$barangKeluar->tipe == "lokal")
                <td>IDR {!! Utils::decimal($item->nilai_ppn ?? 0, 2); !!} </td>
              @endif
            </tr>
          @endforeach
          <tr>
            <td colspan="2" class="text-right font-weight-bold">Total</td>
            <td>{{ $totalJumlah }} {{$items[0]->barang->satuan}}</td>
            <td>{!! Utils::decimal($totalNetto, 3); !!} KG</td>
            <td>{{ $items[0]->mata_uang }} {!! Utils::decimal($totalNilai, 2); !!} </td>
          </tr>

        </tbody>
    </table>
  </div>
</div>
<div class="row">
  
  <div class="form-group col-md-6">
    <label>Nomor Surat Jalan <span class="text-danger">*</span></label>
    <input type="text" name="no_sj" class="form-control" placeholder="Nomor Surat Jalan" style="text-transform:uppercase">
  </div> 
  <div class="form-group col-md-6 ">
    <label>Tanggal Surat Jalan <span class="text-danger">*</span></label>
    <div class='date'>
        <input type='text' class="form-control" name="tgl_sj" id='tanggal_surat_jalan' style="background-color: white; " placeholder="Pilih Tanggal Bukti" value="" />
    </div>
  </div>
  <div class="form-group col-md-12 d-flex">
    <label class="custom-toggle">
        <input type="checkbox" id="barang_tiba" name="barang_tiba" onchange="changeStatus(this)">
        <span class="custom-toggle-slider rounded-circle"></span>
    </label>
    <span class="ml-2">Reminder Berdasarkan Barang Tiba ?</span>
  </div>
  <div class="form-group col-md-12 tanggal_barang_diterima">
    <label>Tanggal Barang Diterima <span class="text-danger">*</span></label>
    <div class='date'>
        <input type='text' class="form-control" id="tgl_bt" name="tgl_bt" id='' style="background-color: white; " placeholder="Pilih Tanggal Bukti" value="" />
    </div>
  </div>
</div>

<script>
  function changeStatus(e) {
    const toggle = $(e).prop("checked");
    if (toggle) {
      $(".tanggal_barang_diterima").slideDown();
    } else {
      $(".tanggal_barang_diterima").slideUp();
    }
  }
  $(() => {
    $('#tanggal_surat_jalan').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
    $('#tgl_bt').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
    var initialTipe = $("#barang_tiba").prop("checked")
    if(initialTipe){
      $(".tanggal_barang_diterima").slideDown();
    } else {
      $(".tanggal_barang_diterima").slideUp();
    }
  })
</script>
