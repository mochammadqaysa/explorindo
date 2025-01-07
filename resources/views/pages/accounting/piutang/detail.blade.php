@php
use App\Helpers\Utils;
@endphp
<style>
  td h3 {
      word-wrap: break-word; /* Ensures long words wrap to the next line */
      white-space: normal; /* Allows wrapping for multiple lines of text */
      max-width: 250px;
      min-width: 250px;
  }
</style>
<div class="card shadow">
  <div class="card-body">
    <table class="table table-borderless align-items-left table-flush table-header col-md-6">
      <tbody>
        <tr>
          <td>
            Nomor Surat Jalan
            <h3>{{ @$piutang->nomor_sj }}</h3>
          </td>
          <td>
            Tanggal Surat Jalan
            <h3>{{ Utils::formatTanggalLaporan(@$piutang->tanggal_sj) }}</h3>
          </td>
          <td>
            Tanggal Barang Tiba
            <h3>{{ Utils::formatTanggalLaporan(@$piutang->tanggal_received) }}</h3>
          </td>
        </tr>
        <tr>
          <td>
            Nama Pelanggan
            <h3>{{ @$piutang->barangKeluar->customer->nama }}</h3>
          </td>
          <td>
            Alamat
            <h3>{{ @$piutang->barangKeluar->customer->alamat }}</h3>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered table-success table-striped mt-2 mb-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Netto</th>
                <th>Nilai</th>
                @if (@$piutang->barangKeluar->tipe == "lokal")
                <th>PPN</th>
                @endif
            </tr>
        </thead>
        <tbody>
          @php
            $items = $piutang->barangKeluar->barangKeluarItems;   
            $totalJumlah = 0;
            $totalNetto = 0;
            $totalNilai = 0;
            $totalPpn = 0;
          @endphp
          @foreach ($items as $item)
            @php
              $totalJumlah += $item->jumlah;
              $totalNetto += $item->netto;
              $totalNilai += $item->nilai;  
              if($piutang->barangKeluar->tipe == "lokal"){
                $totalPpn += $item->nilai_ppn;
              }
            @endphp
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->barang->nama }} {{ $item->barang->warna }} {{ $item->barang->panjang }} x {{ $item->barang->lebar }} x {{ $item->barang->tebal }}</td>
              <td>{{ $item->jumlah }} {{$item->barang->satuan}}</td>
              <td>{!! Utils::decimal($item->netto ?? 0, 3); !!} KG</td>
              <td>{{ $item->mata_uang }} {!! Utils::decimal($item->nilai ?? 0, 2); !!} </td>
              @if (@$piutang->barangKeluar->tipe == "lokal")
                <td>IDR {!! Utils::decimal($item->nilai_ppn ?? 0, 2); !!} </td>
              @endif
            </tr>
          @endforeach
          <tr>
            <td colspan="2" class="text-right font-weight-bold">Total</td>
            <td>{{ $totalJumlah }} {{$items[0]->barang->satuan}}</td>
            <td>{!! Utils::decimal($totalNetto, 3); !!} KG</td>
            <td>{{ $items[0]->mata_uang }} {!! Utils::decimal($totalNilai, 2); !!} </td>
            @if (@$piutang->barangKeluar->tipe == "lokal")
              <td>IDR {!! Utils::decimal($totalPpn, 2); !!} </td>
            @endif
          </tr>

        </tbody>
    </table>
    <h3 class="mb-4">Timeline Pelunasan</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="timeline timeline-two-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
          <div class="timeline-block">
            <span class="timeline-step badge-info">
              <i class="ni ni-bell-55"></i>
            </span>
            <div class="timeline-content">
              <small class="text-muted font-weight-bold">{{ $piutang->based_on_received == '1' ? Utils::formatTanggalIndo($piutang->tanggal_received) : Utils::formatTanggalIndo($piutang->tanggal_sj) }}</small>
              <h5 class=" mt-3 mb-0">Pembuatan Piutang, Reminder & Pengeluaran Barang Jadi</h5>
              <p class=" text-sm mt-1 mb-0">Pencatatan piutang yang terutang kepada {{ $piutang->barangKeluar->customer->nama }} dengan nomor surat jalan {{ $piutang->nomor_sj }}</p>
              {{-- <div class="mt-3">
                <span class="badge badge-pill badge-success">design</span>
                <span class="badge badge-pill badge-success">system</span>
                <span class="badge badge-pill badge-success">creative</span>
              </div> --}}
            </div>
          </div>
          @foreach ($pelunasans as $pelunasan)
          <div class="timeline-block">
            <span class="timeline-step badge-success">
              <i class="fas fa-file-invoice-dollar"></i>
            </span>
            <div class="timeline-content">
              <small class="text-muted font-weight-bold">{{ Utils::formatTanggalIndo($pelunasan->tanggal_bayar) }}</small>
              <h5 class=" mt-3 mb-0">Pembayaran Ke {{$loop->iteration}}</h5>
              <p class=" text-sm mt-1 mb-0">Pembayaran ke {{ $loop->iteration }} dengan bukti bayar <strong>{{ $pelunasan->nomor_pelunasan }}</strong> dan ber-nominal <strong>IDR {!! Utils::decimal($pelunasan->nominal_bayar, 3) !!}</strong></p>
              {{-- <div class="mt-3">
                <span class="badge badge-pill badge-danger">design</span>
                <span class="badge badge-pill badge-danger">system</span>
                <span class="badge badge-pill badge-danger">creative</span>
              </div> --}}
            </div>
          </div>
          @endforeach
          {{-- <div class="timeline-block">
            <span class="timeline-step badge-success">
              <i class="fas fa-file-invoice-dollar"></i>
            </span>
            <div class="timeline-content">
              <small class="text-muted font-weight-bold">10:30 AM</small>
              <h5 class=" mt-3 mb-0">Pembayaran Ke 2</h5>
              <p class=" text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
          </div>
          <div class="timeline-block">
            <span class="timeline-step badge-success">
              <i class="fas fa-file-invoice-dollar"></i>
            </span>
            <div class="timeline-content">
              <small class="text-muted font-weight-bold">10:30 AM</small>
              <h5 class=" mt-3 mb-0">Pembayaran Ke 3</h5>
              <p class=" text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>