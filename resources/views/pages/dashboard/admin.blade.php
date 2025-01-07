@extends('layouts.root')

@section('title','Dashboard')

@section('breadcrum')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="ni ni-tv-2"></i></a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
@endsection

@section('page')
<div class="row">
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Supplier</h5>
            <span class="h2 font-weight-bold mb-0">{{ $data['nasabah'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
              <i class="fas fa-dolly"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Customer</h5>
            <span class="h2 font-weight-bold mb-0">{{ $data['dikunjungi'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
              <i class="fas fa-hand-holding-usd"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Stok Bahan Baku</h5>
            <span class="h2 font-weight-bold mb-0">{{ $data['tagihan'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
              <i class="fas fa-cubes"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Stok Barang Jadi</h5>
            <span class="h2 font-weight-bold mb-0">{{ $data['setoran'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="fas fa-pallet"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-6">
    <div class="card ">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">API</h6>
            <h5 class="h3  mb-0"><i class="fas fa-money-bill-alt"></i> Kurs Berdasarkan Badan Kebijakan Fiskal - KEMENKEU</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('dashboard.kurs') }}" method="POST" id="formKurs">
          @csrf
          <div class="row align-items-center" id="form-list">
            <div class="form-group col-md-12">
              <label>Tanggal <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control" name="tgl_kurs" id="tgl_kurs" style="background-color: white;" placeholder="Pilih Tanggal" aria-describedby="validationPeriod" />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-calendar"></i>
                  </span>
                </div>
                <div id="validationPeriod" class="invalid-feedback">
                  Mohon isi Tanggal terlebih dahulu
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- Chart -->
        <div class="row justify-content-around">
          <table class="table table-borderless align-items-left table-flush table-header col-md-4">
            <tbody class="card bg-diy text-white">
              <tr>
                <td>
                  Dollar (USD)
                  <h1 class="text-white">1</h1>
                </td>
                <td>
                  <br>
                  <div><i class="fas fa-lg fa-long-arrow-alt-right" style="font-size: xx-large;"></i></div>
                </td>
                <td>
                  Rupiah (IDR)
                  <h1 id="nominal-kurs-usd" class="text-white">xxx</h1>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="table table-borderless align-items-left table-flush table-header col-md-4">
            <tbody class="card bg-primary text-white">
              <tr>
                <td>
                  Euro (EUR)
                  <h1 class="text-white">1</h1>
                </td>
                <td>
                  <br>
                  <div><i class="fas fa-lg fa-long-arrow-alt-right" style="font-size: xx-large;"></i></div>
                </td>
                <td>
                  Rupiah (IDR)
                  <h1 id="nominal-kurs-eur" class="text-white">xxx</h1>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-6">
    <div class="card ">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">Grafik</h6>
            <h5 class="h3  mb-0"><i class="fas fa-chart-line"></i> Pertumbuhan Ekspor</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Chart -->
        <div id="chart-ekspor"></div>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">Grafik</h6>
            <h5 class="h3 mb-0"><i class="fas fa-chart-line"></i> Pertumbuhan Impor</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Chart -->
        <div class="chart">
          <div id="chart-impor"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">5 Ekspor Terakhir</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Tipe</label>
          <select class="select2 form-control" id="select2-ekspor">
            <option value="bahan_baku">Bahan Baku</option>
            <option value="minggu">Barang Jadi</option>
            <option value="bulan">Waste / Scrap</option>
          </select>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nama / No SPPB</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Nilai</th>
              <th scope="col">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                000115/KBC.0903/2024
              </th>
              <td>
                4,569
              </td>
              <td>
                340
              </td>
              <td>
                14 Januari 2024
                {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
              </td>
            </tr>
            <tr>
              <th scope="row">
                PMMA LX XM553 (K)
              </th>
              <td>
                4,569
              </td>
              <td>
                340
              </td>
              <td>
                14 Januari 2024
                {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
              </td>
            </tr>
            <tr>
              <th scope="row">
                TIARAPRIME F3 GREY_7226M 2439 x 1219 x 0.80
              </th>
              <td>
                4,569
              </td>
              <td>
                340
              </td>
              <td>
                14 Januari 2024
                {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">5 Impor Terakhir</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Tipe</label>
          <select class="select2 form-control" id="select2-ao">
            <option value="bahan_baku">Bahan Baku</option>
            <option value="minggu">Barang Jadi</option>
            <option value="bulan">Waste / Scrap</option>
          </select>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nama / No SPPB</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Nilai</th>
              <th scope="col">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                Debu
              </th>
              <td>
                360,000
              </td>
              <td>
                -
              </td>
              <td>
                15 Januari 2024
                {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
              </td>
            </tr>
            <tr>
              <th scope="row">
                TIARAPRIME F3 GREY_7254M 2439 x 1219 x 0.80
              </th>
              <td>
                600
              </td>
              <td>
                -
              </td>
              <td>
                15 Januari 2024
                {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  let today = new Date();

  var optionsEkspor = {
    chart: {
      height: 350,
      type: 'area',
      fontFamily: 'Lexend Deca, sans-serif',
    },
    fill: {
      colors: ['#0F8CFF', '#2DCEC0', '#F53E54']
    },
    series: [
      {
        color : "#0F8CFF",
        name: 'Bahan Baku',
        data: [0,0,0,0,0,0,0,0,100,0,0,0]
      },
      {
        color: "#2DCEC0",
        name: 'Barang Jadi',
        data: [0,0,0,0,500,0,0,0,0,0,0,0]
      },
      {
        color: "#F53E54",
        name: 'Waste / Scrap',
        data: [0,0,0,0,0,0,0,0,0,0,400,100]
      },
    ],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    xaxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
    },
  }
  var chartEkspor = new ApexCharts(document.querySelector("#chart-ekspor"), optionsEkspor);

  var optionsImpor = {
    chart: {
      height: 350,
      type: 'area',
      fontFamily: 'Lexend Deca, sans-serif',
    },
    fill: {
      colors: ['#0F8CFF', '#2DCEC0', '#F53E54']
    },
    series: [
      {
        color : "#0F8CFF",
        name: 'Bahan Baku',
        data: [0,0,0,0,0,0,0,0,100,0,0,0]
      },
      {
        color: "#2DCEC0",
        name: 'Barang Jadi',
        data: [0,0,0,0,500,0,0,0,0,0,0,0]
      },
      {
        color: "#F53E54",
        name: 'Waste / Scrap',
        data: [0,0,0,0,0,0,0,0,0,0,400,100]
      },
    ],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    xaxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
    },
  }
  var chartImpor = new ApexCharts(document.querySelector("#chart-impor"), optionsImpor);

  function getKurs(date) {
    let formattedDate = date.replaceAll('-','');
    let el_form = $('#formKurs');
    let target = el_form.attr('action');
    let formData = new FormData();
    formData.append('tgl_kurs',formattedDate);
    $.ajax({
      url: target,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',
    }).done((res) => {
      if(res?.status == true){
        $('#nominal-kurs-usd').text(res.data[0].nilai);
        $('#nominal-kurs-eur').text(res.data[1].nilai);
      }
    }).fail((xhr) => {
      if(xhr?.status == 422){
        Ryuna.noty('error', '', xhr?.responseJSON?.message)
      }else{
        Ryuna.noty('error', '', xhr?.responseJSON?.message)
      }
    })

  }

  $(() => {
    $('#tgl_kurs').flatpickr({
      defaultDate : 'today',
      maxDate: "today",
      dateFormat: "Y-m-d",
      onChange: (selectedDates, dateStr, instance) => {
        getKurs(dateStr);
      }
    })

    var initKursDate = $('#tgl_kurs').val();
    if (initKursDate) {
      getKurs(initKursDate);
    }
    
    // chartEkspor.render();
    // chartImpor.render();
  })
</script>
@endsection