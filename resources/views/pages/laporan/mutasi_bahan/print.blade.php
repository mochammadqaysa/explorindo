<!-- resources/views/pdf/report.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Laporan Mutasi Bahan Baku | PT. Tiara Indoprima</title>
    <link rel="icon" href="{{ asset('argon2/assets/img/logo.png') }}" type="image/png">
    <style>
      @font-face {
          font-family: 'Heebo';
          font-style: normal;
          font-weight: 400;
          src: url('{{ asset('fonts/Heebo-Regular.ttf') }}') format('truetype');
      }
      body {
          /* font-family: Arial, sans-serif; */
          font-family: 'Heebo', sans-serif;
          font-size: 12px;
          margin: 20px;
      }
      table {
          width: 100%;
          border-collapse: collapse;
      }
      th, td {
          border: 1px solid #9CA3AF;
          padding: 5px;
          text-align: center;
      }
      th {
          font-weight: bolder;
      }
      h1, h3 {
          text-align: center;
      }
      .total {
          font-weight: bold;
      }
      @media print {
          @page {
              size: landscape; /* Set the orientation to landscape */
          }
          .print\:hidden {
              display: none;
          }
          body {
            zoom: 60%;
          }
      }

      .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
      }

      .title {
          margin-left: 500px;
          text-align: center;
      }

      .desc {
          text-align: right;
          font-weight: bold;
      }

      .direct {
          background: none;
          border: none;
          padding: 0;
          margin: 0;
          cursor: pointer;
      }
      button {
          text-decoration: none;
          color: black;
      }
    </style>
</head>
<body>
  <div class="print:hidden flex gap-1">
      <button size="small" id="excel">Export to excel</button>
      <button size="small" onclick="window.print()" >Print</button>
  </div>
  <div class="header">
      <div class="title">
          <h1>LAPORAN MUTASI BAHAN BAKU</h1>
          <h3>PT. Tiara Indoprima</h3>
      </div>
      <p class="desc">
        LAMPIRAN XXII <br> PERATURAN DIREKTUR JENDERAL BEA DAN CUKAI <br> NOMOR PER-5/BC/2023 <br> TENTANG <br> TATA LAKSANA MONITORING DAN EVALUASI TERHADAP <br> PERUSAHAAN PENERIMA FASILITAS KEMUDAHAN IMPOR TUJUAN EKSPOR
    </p>
  </div>
  <p>Periode: {{$from}} s.d. {{$to}}</p>
  @php use App\Helpers\Utils; @endphp
  <table id="table">
      <thead>
          <tr>
              <th>No.</th>
              <th>Kode BB</th>
              <th>Nama Bahan</th>
              <th>Satuan</th>
              <th>Saldo Awal</th>
              <th>Pemasukan</th>
              <th>Pengeluaran</th>
              <th>Returan</th>
              <th>Saldo Akhir</th>
              <th>Gudang</th>
          </tr>
      </thead>
      <tbody>
        @foreach($laporan as $item)
        <tr>
            
            <td>{{ $loop->iteration }}</td>
            <td style="text-align: left">{{ $item['kode'] }}</td>
            <td style="text-align: left">{{ $item['nama_bahan'] }}</td>
            <td>{{ $item['satuan'] }}</td>
            <td style="text-align: right">{!! !is_null($item['saldo_awal']) && $item['saldo_awal'] != '0.00' ? Utils::decimal($item['saldo_awal'],3) : "" !!}</td>
            <td style="text-align: right">{!! !is_null($item['jumlah_masuk']) && $item['jumlah_masuk'] != '0.00' ? '<button class="direct" onClick="navigateToMasuk(\''.$date1.'\',\''.$date2.'\',\''. $item['bahan_uid'] .'\')" >' . Utils::decimal($item['jumlah_masuk'],3) ."</button>" : "" !!}</td>
            <td style="text-align: right">{!! !is_null($item['jumlah_keluar']) && $item['jumlah_keluar'] != '0.00' ? '<button class="direct" onClick="navigateToKeluar(\''.$date1.'\',\''.$date2.'\',\''. $item['bahan_uid'] .'\')" >' . Utils::decimal($item['jumlah_keluar'],3) ."</button>" : "" !!}</td>
            <td style="text-align: right">{!! !is_null($item['jumlah_retur']) && $item['jumlah_retur'] != '0.00' ? '<button class="direct" onClick="navigateToRetur(\''.$date1.'\',\''.$date2.'\',\''. $item['bahan_uid'] .'\')" >' . Utils::decimal($item['jumlah_retur'],3) ."</button>" : "" !!}</td>
            <td style="text-align: right">{!! !is_null($item['saldo_akhir']) && $item['saldo_akhir'] != '0.000' ? Utils::decimal($item['saldo_akhir'],3) : "" !!}</td>
            <td>{{ $item['gudang'] }}</td>
        </tr>
        @endforeach
        <tr class="xls-ignore">
            <td colspan="4" rowspan="2" class="total" style="text-align: end; font-size: 20px; letter-spacing: 20px">TOTAL</td>
            <td rowspan="2" style="text-align: right">
                @foreach($stat['total_saldo_awal'] as $key => $value)
                {!! Utils::decimal($value,3) !!}&nbsp; {{$key}}<br>
                @endforeach
            </td>
            <td rowspan="2" style="text-align: right">
                @foreach($stat['total_jumlah_masuk'] as $key => $value)
                {!! Utils::decimal($value,3) !!}&nbsp; {{$key}}<br>
                @endforeach
            </td>
            <td rowspan="2" style="text-align: right">
                @foreach($stat['total_jumlah_keluar'] as $key => $value)
                {!! Utils::decimal($value,3) !!}&nbsp; {{$key}}<br>
                @endforeach
            </td>
            <td rowspan="2" style="text-align: right">
                @foreach($stat['total_jumlah_retur'] as $key => $value)
                {!! Utils::decimal($value,3) !!}&nbsp; {{$key}}<br>
                @endforeach
            </td>
            <td rowspan="2" style="text-align: right">
                @foreach($stat['total_saldo_akhir'] as $key => $value)
                {!! Utils::decimal($value,3) !!}&nbsp; {{$key}}<br>
                @endforeach
            </td>
            <td></td>
            {{-- <td rowspan="2">
                @foreach($stat['total_nilai'] as $key => $value)
                {{ $key }}<br>
                @endforeach
            </td> --}}
            {{-- <td rowspan="2" class="digit" style="text-align: right">
                @foreach($stat['total_nilai'] as $key => $value)
                {!! Utils::decimal($value) !!}<br>
                @endforeach
            </td> --}}
        </tr>
      </tbody>
  </table>
{{-- Global js --}}

<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script>
    function navigateToMasuk(from, to, bahan) {
        // Use window.location.href to navigate to a new page
        window.location.href = `{{ route('result-report.bahan-masuk') }}?periode=${from}+-+${to}&tipe=semua&bahan=${bahan}&fasilitas=semua`;
    }
    function navigateToKeluar(from, to, bahan) {
        // Use window.location.href to navigate to a new page
        window.location.href = `{{ route('result-report.bahan-keluar') }}?periode=${from}+-+${to}&transaksi=keluar&bahan=${bahan}`;
    }
    function navigateToRetur(from, to, bahan) {
        // Use window.location.href to navigate to a new page
        window.location.href = `{{ route('result-report.bahan-keluar') }}?periode=${from}+-+${to}&transaksi=retur&bahan=${bahan}`;
    }
  function tableToExcel(content, filename) {
      $.ajax({
          url: "{{ route('excel-report.mutasi-bahan') }}",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",  // Switch to POST
          data: {
              content: content,
              filename: filename
          },
          xhrFields: {
              responseType: 'blob'  // Ensure we handle the file as a blob for download
          },
          success: (res, status, xhr) => {
              // Create a temporary link element to trigger the download
              const blob = new Blob([res], { type: xhr.getResponseHeader('Content-Type') });
              const url = window.URL.createObjectURL(blob);
              const a = document.createElement('a');
              a.href = url;
              a.download = filename + '.xls'; // The filename to be downloaded
              document.body.appendChild(a);
              a.click();
              a.remove();
              window.URL.revokeObjectURL(url);
          },
          error: (err) => {
              console.error(err);  // Handle the error
          }
      });
  }
  function handleExport() {
    const content = Ryuna.tableToString('table'); // Correct usage of the class method
    var today = new Date();
    var h = String(today.getHours()).padStart(2, '0');
    var i = String(today.getMinutes()).padStart(2, '0');
    var s = String(today.getSeconds()).padStart(2, '0');
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    const filename = `LAPORAN-MUTASI-BAHAN-BAKU-${yyyy}${mm}${dd}${h}${i}${s}`; // Add your desired filename here
    tableToExcel(content, filename);
  }

  $(document).ready(function() {
    // This will ensure handleExport is ready to be used
    $('#excel').on('click', handleExport);
  }); 
</script>
</body>
</html>