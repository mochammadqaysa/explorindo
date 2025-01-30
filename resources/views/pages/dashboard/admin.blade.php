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
      colors: ['#5143D9', '#2DCEC0', '#F53E54']
    },
    series: [
      {
        color : "#5143D9",
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
      colors: ['#5143D9', '#2DCEC0', '#F53E54']
    },
    series: [
      {
        color : "#5143D9",
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

</script>
@endsection