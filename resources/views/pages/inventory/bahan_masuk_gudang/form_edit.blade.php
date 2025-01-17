<style>
    .step-header {
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .step-list {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }
    .step-header-number{
        display: -ms-inline-flexbox;
        display: inline-flex;
        -ms-flex-line-pack: center;
        align-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 2em;
        height: 2em;
        padding: 0.5em 0;
        margin: 0.25rem;
        line-height: 1em;
        color: #fff;
        font-weight: 500;
        background-color: #6c757d;
        border-radius: 1em;
    }

    .step-button{
        text-align: center;
        padding: 0px 50px;
    }

    .step-header-number.active{
        color: #fff;
        background-color: #5e72e4;
    }

    .step-header-title{
        text-align: center;
    }

    .flatpickr-wrapper{
        width: 100% !important
    }

    .logo_image_picker{
        border-radius: 0.4rem !important;
        border: 1.5px dotted #dee2e6;
    }

    .image-hover-handler{
        transition: 0.5s;
    }
    .logo_image_picker:hover{
        .wrap_logo_image_picker{
        transform: scale(0.95)
        }

        .image-hover-handler{
        transform: scale(0.95)
        }
    }

    .wrap_logo_image_picker{
        transition: 0.5s;
    }
</style>

<div class="step-box">
    <div class="step-header">
        <div class="step-list">
          <div class="step-button" data-tab="1">
              <div class="step-header-number active">1</div>
              <div class="step-header-title">Data Awal</div>
          </div>
          <div class="step-button" data-tab="2">
              <div class="step-header-number">2</div>
              <div class="step-header-title">Data Item</div>
          </div>
          <div class="step-button" data-tab="3">
              <div class="step-header-number">3</div>
              <div class="step-header-title">Ringkasan</div>
          </div>
        </div>
    </div>
    <div class="step-body" data-tab="1">
      <div class="row">
        <div class="form-group col-md-12">
          <label>Tipe <span class="text-danger">*</span></label><br>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="tipe2" name="tipe" class="custom-control-input" value="lokal" {{ @$data->tipe == "lokal" ? "checked" : "" }}>
            <label class="custom-control-label" for="tipe2">Lokal</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="tipe1"  name="tipe" class="custom-control-input" value="impor" {{ @$data->tipe == "impor" ? "checked" : "" }}>
            <label class="custom-control-label" for="tipe1">Impor</label>
          </div>
          
        </div>
        <div class="form-group col-md-12">
          <label>Supplier <span class="text-danger">*</span></label>
          <select name="supplier" class="form-control select2" disabled id="supplier">
            <option></option>
            @if(isset($data->supplier->uid))
            <option value="{{ $data->supplier->uid }}" selected data-negara="{{$data->supplier->negara}}">{{ $data->supplier->nama }}</option>
            @endif
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Nomor Bukti <span class="text-danger">*</span></label>
          <input type="text" name="nomor_bukti" class="form-control" placeholder="Nomor Bukti" value="{{ @$data->nomor_bukti }}" style="text-transform: uppercase;">
        </div>
        <div class="form-group col-md-6 ">
          <label>Tanggal Bukti <span class="text-danger">*</span></label>
          <div class='date'>
            <input type='text' class="form-control" name="tanggal_bukti" id='tanggal_bukti' style="background-color: white; " placeholder="Pilih Tanggal Bukti" value="{{ @$data->tanggal_bukti }}" />
          </div>
        </div>
        <div class="form-group col-md-6" id="impor-nomor-pib">
          <label>Nomor PIB</label>
          <input type="text" name="nomor_pib" class="form-control" placeholder="Nomor PIB" value="{{ @$data->nomor_pib }}" style="text-transform: uppercase;">
        </div>
        <div class="form-group col-md-6" id="impor-tgl-pib">
          <label>Tanggal PIB</label>
          <div class='date'>
            <input type='text' class="form-control" name="tanggal_pib" id='tanggal_pib' style="background-color: white; " placeholder="Pilih Tanggal PIB" value="{{ @$data->tanggal_pib }}" />
          </div>
        </div>
        <div class="form-group col-md-12">
          <label>Nomor PO</label>
          <input type="text" name="nomor_po" class="form-control" placeholder="Nomor PO" value="{{ @$data->nomor_po }}" style="text-transform: uppercase;">
        </div>
      </div>
    </div>
    <div class="step-body" data-tab="2" style="display: none;">
      <div class="col-md-10 mx-auto mb-5">
        <div id="dynamic-form">
          <!-- Original Form -->
          @foreach ($bahanMasukItems as $key => $bahanItem)
          <div class="form-item card shadow">
            <input type="hidden" name="bahan_item_uid[]" value="{{ $bahanItem->uid }}">
            <div class="card-header" id="heading{{$key}}">
              <div class="d-flex align-items-center">
                  <span class="ml-2 mr-3 item-number">Item {{$key}}</span>
                  <hr class="flex-grow-1">
                  <a href="#collapse{{$key}}" class="btn btn-info btn-sm item-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse{{$key}}">
                    <i class="fas fa-window-minimize"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm remove-form" style="display: none"><i class="fas fa-trash"></i></a>
              </div>
            </div>
  
            <div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading{{$key}}" data-parent="#dynamic-form">
              <div class="card-body">
                <div class="row">
                  <!-- Kode HS -->
                  <div class="form-group col-md-4 impor-kode-hs">
                      <label>Kode HS</label>
                      <input type="text" name="kode_hs[]" class="form-control" placeholder="Kode HS" value="{{ $bahanItem->kode_hs }}" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Seri -->
                  <div class="form-group col-md-4 impor-nomor-seri">
                      <label>Nomor Seri</label>
                      <input type="text" name="nomor_seri[]" class="form-control" placeholder="Nomor Seri" value="{{ $bahanItem->nomor_seri }}" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Lot -->
                  <div class="form-group col-md-4">
                      <label>Nomor Lot </label>
                      <input type="text" name="nomor_lot[]" class="form-control" placeholder="Nomor Lot" value="{{ $bahanItem->nomor_lot }}" style="text-transform: uppercase;">
                  </div>
                  <!-- Bahan -->
                  <div class="form-group col-md-12">
                    <label>Bahan <span class="text-danger">*</span></label>
                    <select name="bahan[{{ $key }}]" class="form-control select2-bahan">
                      <option></option>
                      @foreach ($bahan as $item)
                          <option value="{{$item->uid}}" {{ $bahanItem->bahan_uid == $item->uid ? "selected" : "" }}>{{$item->nama}}</option>
                      @endforeach
                    </select>
                    <small id="stok-bahan" style="display: none" class="form-text text-muted"></small>
                  </div>
                  <!-- Jumlah -->
                  <div class="form-group col-md-6 ">
                      <label>Jumlah <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" step=".001" name="jumlah[]" class="form-control" placeholder="Jumlah" value="{{ $bahanItem->jumlah }}">
                          <div class="input-group-append">
                              <span class="input-group-text append-satuan">{{ $bahanItem->bahan->satuan }}</span>
                          </div>
                      </div>
                  </div>
                  <!-- Jumlah KG (Netto) -->
                  <div class="form-group col-md-12 jumlah-kg" style="display: none;">
                      <label>Jumlah KG (Netto) <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="jumlah_kg[]" class="form-control" step=".001" placeholder="Jumlah KG (Netto)" value="{{ $bahanItem->jumlah_kg }}">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>
                  <!-- Gudang Penyimpanan -->
                  <div class="form-group col-md-12">
                      <label>Gudang Penyimpanan </label>
                      <select class="form-control select2-gudang" name="gudang_penyimpanan[{{$key}}]">
                          <option value="" disabled selected>Choose One</option>
                          @foreach ($gudang as $item)
                              <option value="{{$item->uid}}" {{ $item->uid == $bahanItem->gudang_uid ? "selected" : "" }}>{{$item->nama}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-12 impor-fasilitas">
                    <label>Fasilitas</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[{{$key}}]" id="fasilitas{{$key+1}}" value="ya" {{ $bahanItem->fasilitas == 1 ? "checked" : "" }}>
                      <label class="form-check-label" for="fasilitas1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[{{$key}}]" id="fasilitas{{$key+2}}" value="tidak" {{ $bahanItem->fasilitas == 0 ? "checked" : "" }}>
                      <label class="form-check-label" for="fasilitas2">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Button to add new form -->
        <a href="javascript:void(0)" id="add-form" class="btn btn-success mt-3"><i class="fas fa-plus"></i> Tambah Item</a>
      </div>
    </div>
    <div class="step-body" data-tab="3" style="display: none;">
      <div class="col-md-10 mx-auto">
          <table class="table table-borderless align-items-left table-flush table-header col-md-6">
              <tbody>
                  <tr>
                      <td>Supplier</td>
                      <td>:</td>
                      <th class="supplier"> <span class="badge badge-default ml-2 supplier-type">tipe supplier</span></th>
                  </tr>
                  <tr>
                      <td>Negara Asal</td>
                      <td>:</td>
                      <th class="negara-asal"></th>
                  </tr>
                  <tr>
                      <td>Nomor Bukti</td>
                      <td>:</td>
                      <th class="nomor-bukti">Nomor Bukti</th>
                  </tr>
                  <tr>
                      <td>Nomor PO</td>
                      <td>:</td>
                      <th class="nomor-po">Nomor PO</th>
                  </tr>
                  <tr>
                      <td>Nomor PIB</td>
                      <td>:</td>
                      <th class="nomor-pib">Nomor PIB</th>
                  </tr>
                  <tr>
                      <td>Tanggal PIB</td>
                      <td>:</td>
                      <th class="tanggal-pib">Tanggal</th>
                  </tr>
              </tbody>
          </table>

          <div class="py-2">
            <h5>Informasi Item</h5>
              <table class="table table-responsive display nowrap" style="width:100%" id="table-bahanmasuk-ringkasan">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th class="all">Kode HS</th>
                          <th class="all">Nomor Seri</th>
                          <th class="all">Nomor Lot</th>
                          <th class="all">Nama Bahan</th>
                          <th class="none">Jumlah</th>
                          <th class="none">Fasilitas</th>
                          <th class="none">Penyimpanan</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
            <div class="col-md-12" style="display: none;">
              <h5>Keterangan : </h5>
              <h5 class="d-inline pr-5"><i class="fas fa-circle text-success "></i> Data Baru</h5>
              <h5 class="d-inline pr-5"><i class="fas fa-circle text-info"></i> Data Diubah</h5>
              <h5 class="d-inline pr-5"><i class="fas fa-circle text-danger "></i> Data Dihapus</h5>
            </div>
          </div>
      </div>
      
    </div>
</div>

<script>
  // Collect and display data from Step 1 and Step 2 to Step 3
  function collectAndDisplayData() {
      // Collect data from Step 1
      var tipe = $('input[name="tipe"]:checked').val();
      var supplier = $("#supplier").select2('data')[0].nama ?? $("#supplier").select2('data')[0].text;
      var negara = $("#supplier").select2('data')[0].negara ?? $("#supplier option:selected").attr("data-negara");
      var nomor_bukti = $('input[name="nomor_bukti"]').val().toUpperCase();
      var nomor_po = $('input[name="nomor_po"]').val().toUpperCase();
      var nomor_pib = $('input[name="nomor_pib"]').val().toUpperCase();
      var tanggal_pib = $('input[name="tanggal_pib"]').val();
      
      // Update Step 3 fields
      $('th.supplier').html(supplier + ` <span class="badge badge-default ml-2 supplier-type">${tipe}</span>`);
      $('th.negara-asal').text(negara);
      $('th.nomor-bukti').text(nomor_bukti);
      $('th.nomor-po').text(nomor_po);

      // Collect and display dynamic data from Step 2 (loop through forms)
      $('#table-bahanmasuk-ringkasan tbody').empty(); // Clear table body
      let existingData = @json($bahanMasukItems);

      $('#dynamic-form .form-item').each(function(index) {
          var bahan_item_uid = $(this).find('input[name="bahan_item_uid[]"]').val();
          var kode_hs = $(this).find('input[name="kode_hs[]"]').val().toUpperCase();
          var nomor_seri = $(this).find('input[name="nomor_seri[]"]').val().toUpperCase();
          var nomor_lot = $(this).find('input[name="nomor_lot[]"]').val().toUpperCase();
          var bahan = $(this).find(`select[name="bahan[${index}]"]`).select2('data')[0].text;
          var jumlah = $(this).find('input[name="jumlah[]"]').val();
          var satuan = $(this).find('.append-satuan').text();
          var fasilitasName = `fasilitas[${index}]`  // Dynamic name attribute
          var fasilitas = $(this).find('input[name="' + fasilitasName + '"]:checked').val();
          var penyimpanan = $(this).find(`select[name="gudang_penyimpanan[${index}]"]`).select2('data')[0].text;

          // Append the collected data to the table in Step 3
          $('#table-bahanmasuk-ringkasan tbody').append(`
              <tr>
                  <td>${index + 1}</td>
                  <td>${kode_hs}</td>
                  <td>${nomor_seri}</td>
                  <td>${nomor_lot}</td>
                  <td>${bahan}</td>
                  <td>${jumlah} ${satuan}</td>
                  <td>${fasilitas}</td>
                  <td>${penyimpanan}</td>
              </tr>
          `);
      });
      
      if (tipe == 'lokal') {
        $('th.nomor-pib').parent().hide();
        $('th.tanggal-pib').parent().hide();
        $('#table-bahanmasuk-ringkasan th:nth-child(2)').hide();
        $('#table-bahanmasuk-ringkasan td:nth-child(2)').hide();
        $('#table-bahanmasuk-ringkasan th:nth-child(3)').hide();
        $('#table-bahanmasuk-ringkasan td:nth-child(3)').hide();
        $('#table-bahanmasuk-ringkasan th:nth-child(8)').hide();
        $('#table-bahanmasuk-ringkasan td:nth-child(8)').hide();
      } else {
        $('th.nomor-pib').parent().show();
        $('th.tanggal-pib').parent().show();
        $('th.nomor-pib').text(nomor_pib);
        $('th.tanggal-pib').text(tanggal_pib);

        
        $('#table-bahanmasuk-ringkasan th:nth-child(2)').show();
        $('#table-bahanmasuk-ringkasan td:nth-child(2)').show();
        $('#table-bahanmasuk-ringkasan th:nth-child(3)').show();
        $('#table-bahanmasuk-ringkasan td:nth-child(3)').show();
        $('#table-bahanmasuk-ringkasan th:nth-child(8)').show();
        $('#table-bahanmasuk-ringkasan td:nth-child(8)').show();
      }
  }
  //stepper
  var max_step = 3
  var stepper = new Stepper({
    max_step: max_step
  })

  function nextStep() {
    let curr_position = stepper.position;
    let isValid = false;
    switch(curr_position) {
      case 1:
        isValid = validateStep1();
        if (isValid) {
          $('.btn-prev').show()
        }
        if ($(".select2-bahan").val()) {
          $(".select2-bahan").trigger('change');
        }
        break;
      case 2:
        isValid = validateStep2();
        collectAndDisplayData();
        break;
      case 3:
        isValid = true;
        break;
      default:
        break;
    }

    if (!isValid) {
      return;
    }

    if (curr_position == max_step) {
        save();
      return;
    }

    stepper.next();

    $('.step-button[data-tab="'+stepper.position+'"] > .step-header-number').addClass('active')
    $('.step-body[data-tab="'+curr_position+'"]').hide()
    $('.step-body[data-tab="'+stepper.position+'"]').show()

    if(stepper.position == max_step){
      $('.btn-next').text('Simpan')
    }
  }

  function prevStep() {
    let curr_position = stepper.position
    stepper.prev()
    if(stepper.position < max_step){
      $('.btn-next').text('Lanjut')

      $('#data_pemegang_va').hide()
      // if( (Ryuna.remove_format_rupiah('#mp1 th') >= 100000000 || Ryuna.remove_format_rupiah('#mp2 th') >= 100000000) && $('#disallow_teller').val() == 'false'){
      //   $('#data_pemegang_va').show()
      // }
    }

    if(stepper.position == 1){
      $('.btn-prev').hide()
      // $('.btn-close').show()
    }

    $('.step-button[data-tab="'+curr_position+'"] > .step-header-number').removeClass('active')

    $('.step-body[data-tab="'+curr_position+'"]').hide()
    $('.step-body[data-tab="'+stepper.position+'"]').show()
  }

  function validateStep1() {
    let kosong = ''
    let validateTipe = $('[name="tipe"]').val()
    if (!validateTipe) {
      kosong += '<li>Kolom Tipe Wajib Diisi</li>'
    }
    
    let validateSupplier = $('[name="supplier"]').val()
    if (!validateSupplier) {
      kosong += '<li>Kolom Supplier Diisi</li>'
    }

    let validateNomorBukti = $('[name="nomor_bukti"]').val()
    if (!validateNomorBukti) {
      kosong += '<li>Kolom Nomor Bukti Diisi</li>'
    }

    let validateTanggalBukti = $('[name="tanggal_bukti"]').val()
    if (!validateTanggalBukti) {
      kosong += '<li>Kolom Tanggal Bukti Diisi</li>'
    }


    $('#response_container').empty()
    if(kosong){
      let message = `<div class="alert alert-danger alert-dismissible fade show">
          <ul style="margin: 0; padding: 0">
            Step 1:
            <ul>
                ${kosong}
            </ul>
          </ul>
        </div>`
      $('#response_container').html(message)
      return false;
    }
    return true;
  }

  function validateStep2() {
    let kosong = ''       
    $('[name="bahan[]"]').each(function(index) {
      let bahanValue = $(this).val(); // Get the value of the current field
      
      if (!bahanValue) {  // If the field is empty
        kosong += `<li>Kolom Bahan pada data ke - ${index + 1} wajib diisi</li>`;
      }
    });

    $('[name="jumlah[]"]').each(function(index) {
      let jumlahValue = $(this).val(); // Get the value of the current field
      
      if (!jumlahValue) {  // If the field is empty
        kosong += `<li>Kolom Jumlah pada data ke - ${index + 1} wajib diisi</li>`;
      }
    });

    $('[name="jumlah_kg[]"]').each(function(index) {
      if ($(this).is(":visible")) {
        let jumlahKgValue = $(this).val(); // Get the value of the current field
        
        if (!jumlahKgValue) {  // If the field is empty
          kosong += `<li>Kolom Jumlah KG (Netto) pada data ke - ${index + 1} wajib diisi</li>`;
        }
      }
    });

    $('#response_container').empty()
    if(kosong){
      let message = `<div class="alert alert-danger alert-dismissible fade show">
          <ul style="margin: 0; padding: 0">
            Step 2
            <ul>
              ${kosong}
            </ul>
          </ul>
        </div>`
      $('#response_container').html(message)
      return false;
    }
    return true;
  }

  
  $(() => {
    $('#tanggal_bukti').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
    $('#tanggal_pib').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
    let _urls = {
      supplier: `{{ route('select2.supplier') }}`,
    }
    var _limit = 10
    function formatResult(res) {
      if (res.loading) {
        return res.text;
      }
      var $container = $(
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='"+ base_url+'img/default-avatar.png'+"'/></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'></div>" +
              "<div class='select2-result-repository__description'></div>" +
            "</div>" +
          "</div>"
        );

        $container.find(".select2-result-repository__title").text(res.nama || '-');
        $container.find(".select2-result-repository__description").text(res.negara || '-');

        return $container
    }

    function formatSelection(res) {
      return res.nama || res.text;
    }
    function loadSuppliers(tipe) {
        $('#supplier').select2({
        ajax: {
          url: _urls.supplier,
          dataType: 'json',
          delay: 250,
          data: function (params) {
            // console.log('req', params)
            return {
              term: params.term,
              page: params.page || 0,
              limit: _limit,
              tipe: tipe // pass the selected 'tipe' value
            };
          },
          processResults: function (data, params) {
            // console.log('res', data)
            params.page = params.page || 0;
            let check = params.page+1;
            return {
              results: data.items,
              pagination: {
                more: (data.total - (check * _limit)) > 0
              }
            };
          },
          cache: true
        },
        placeholder: 'Choose One',
        // minimumInputLength: 1,
        templateResult: formatResult,
        templateSelection: formatSelection
      });
    }
    $('input[name="tipe"]').on('change', function() {
        var selectedTipe = $(this).val();
        $('#supplier').val(null).trigger('change'); 
        loadSuppliers(selectedTipe); 
        if (selectedTipe == "lokal") {
          $("#impor-nomor-pib").hide()
          $("#impor-tgl-pib").hide()
          $("#impor-kurs").hide()
          // step 2
          $(".impor-kode-hs").hide()
          $(".impor-nomor-seri").hide()
          $(".impor-fasilitas").hide()
          $('input[name="nomor_lot[]"]').parent().removeClass("col-md-4").addClass("col-md-12")
          $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
          $('#dynamic-form .form-item').each(function (index) {
            let satuan = $(this).find('.input-group .append-satuan').text()
            if (satuan == "kg") {
              $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-12").addClass("col-md-6")
              $('input[name="mata_uang[]"]').parent().removeClass("col-md-12").addClass("col-md-6")
            } else {
              $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
              $('input[name="mata_uang[]"]').parent().removeClass("col-md-6").addClass("col-md-12")

            }
          });
        } else {
          $("#impor-nomor-pib").show()
          $("#impor-tgl-pib").show()
          $("#impor-kurs").show()
          // step 2
          $(".impor-kode-hs").show()
          $(".impor-nomor-seri").show()
          $(".impor-fasilitas").show()
          $('input[name="nomor_lot[]"]').parent().removeClass("col-md-12").addClass("col-md-4")
          $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-12").addClass("col-md-6")
          var bahanMasukItems = @json($bahanMasukItems);
          $('#dynamic-form .form-item').each(function (index) {
            let satuan = $(this).find('.input-group .append-satuan').text()
            if (satuan == "kg") {
              $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-12").addClass("col-md-6")
              $('input[name="mata_uang[]"]').parent().removeClass("col-md-12").addClass("col-md-6")
            } else {
              $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
              $('input[name="mata_uang[]"]').parent().removeClass("col-md-6").addClass("col-md-12")
            }
          });
        }
    });

    var initialTipe = $('input[name="tipe"]:checked').val();
    if (initialTipe) {
        loadSuppliers(initialTipe);
        $('#supplier').removeAttr("disabled");
        if (initialTipe == "lokal") {
          $("#impor-nomor-pib").hide()
          $("#impor-tgl-pib").hide()
          $("#impor-kurs").hide()
          // step 2
          $(".impor-kode-hs").hide()
          $(".impor-nomor-seri").hide()
          $(".impor-fasilitas").hide()
          $('input[name="nomor_lot[]"]').parent().removeClass("col-md-4").addClass("col-md-12")
          $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
        } else {
          $("#impor-nomor-pib").show()
          $("#impor-tgl-pib").show()
          $("#impor-kurs").show()
          // step 2
          $(".impor-kode-hs").show()
          $(".impor-nomor-seri").show()
          $(".impor-fasilitas").show()
          $('input[name="nomor_lot[]"]').parent().removeClass("col-md-12").addClass("col-md-4")
          $('input[name="jumlah[]"]').parent().parent().removeClass("col-md-12").addClass("col-md-6")
          let bahanMasukItems = @json($bahanMasukItems);
        }
    }

    function parseFixed(form, zero) {
      var kursValue = form.val(); // Get the input value
      var kursFloat = parseFloat(kursValue); // Convert to float
      if (isNaN(kursFloat)) {
        $(this).val(''); // Optionally clear the input if it's not a valid number
      } else {
        form.val(kursFloat.toFixed(zero) || ''); // Use an empty string if it's NaN
      }
    }
    $(document).on('blur', 'input[name="kurs"]', function () {
        parseFixed($(this),2);
    });
    

    // step 2

    var formCount = $('#dynamic-form .form-item').length; // Counter for form numbering

    let initializeSelect2 =  function() {
      $('.select2-bahan').select2({
          placeholder: "Pilih Bahan", // Optional placeholder
          allowClear: true // Allows the user to clear the selection
      });

      $(".select2-bahan").change(function() {
          var bahan = $(this).val(); // Get the selected value
          if (bahan) {
              $.ajax({
                  url: `{{route('bahan.info')}}`,  // Replace with your controller URL
                  method: 'POST',
                  data: {
                      'bahan': bahan // Send selected bahan ID to the server
                  },
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(res) {
                      // Handle success response from the server
                      if (res.status) {

                        $(this).closest('.form-item').find('.input-group-append .append-satuan').parent().show();
                        $(this).closest('.form-item').find('.input-group-append .append-satuan').text(res.data.satuan);
                        $(this).closest('.form-item').find('.form-group #stok-bahan').text("Stok : "+res.data.stok+" "+res.data.satuan);
                        $(this).closest('.form-item').find('.form-group #stok-bahan').slideDown();
                        var tipe = $('input[name="tipe"]:checked').val();
                        if (res.data.satuan.toLowerCase() === "kg") {
                          $(this).closest('.form-item').find('input[name="jumlah_kg[]"]').parent().parent().slideUp();
                          if (tipe == "impor") {
                            $(this).closest('.form-item').find('input[name="jumlah[]"]').parent().parent().removeClass("col-md-12").addClass("col-md-6")
                          } else {
                            $(this).closest('.form-item').find('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
                          }
                          $(this).closest('.form-item').find('input[name="mata_uang[]"]').parent().removeClass("col-md-12").addClass("col-md-6")
                        } else {
                          $(this).closest('.form-item').find('input[name="jumlah_kg[]"]').parent().parent().slideDown();
                          $(this).closest('.form-item').find('input[name="jumlah[]"]').parent().parent().removeClass("col-md-6").addClass("col-md-12")
                          $(this).closest('.form-item').find('input[name="mata_uang[]"]').parent().removeClass("col-md-6").addClass("col-md-12")
                        }
                      }
                      
                      // Example: Update some input with the value returned from the server
                      // Assuming 'response' contains the value you need
                      // You might need to target the specific cloned form
                      // $(this) here refers to the current select element that triggered the change
                      // $(this).closest('.form-item').find('input[name="some_input_field"]').val(response.someValue);
                      
                      // Example of updating some part of the form with the selected value
                  }.bind(this), // Ensure the correct 'this' context
                  error: function(xhr, status, error) {
                      // Handle any errors
                      console.error('AJAX error:', error);
                  }
              });
          } else {
            $(this).closest('.form-item').find('.input-group-append .append-satuan').parent().hide();
          }
      });

      $('.select2-gudang').select2({
          placeholder: "Select an option", // Optional placeholder
          allowClear: true // Allows the user to clear the selection
      });
    }

    $(document).on('blur', 'input[name="jumlah[]"]', function () {
        parseFixed($(this),3);
    });
    $(document).on('blur', 'input[name="jumlah_kg[]"]', function () {
        parseFixed($(this),2);
    });
    



    // Function to update the form numbers and accordion ids
    function updateFormNumbers() {
        $('#dynamic-form .form-item').each(function (index) {
            var formIndex = index + 1;

            // Update the Item number in the accordion header
            $(this).find('.item-number').text('Item ' + formIndex);

            // Update the accordion collapse IDs
            var headerId = 'heading' + formIndex;
            var collapseId = 'collapse' + formIndex;

            $(this).find('.card-header').attr('id', headerId);
            $(this).find('.collapse').attr({
                id: collapseId,
                'aria-labelledby': headerId,
            });
            $(this).find('.item-collapse').attr('href', '#' + collapseId);

            // Hide the delete button for the first form
            if (index === 0) {
                $(this).find('.remove-form').hide();
            } else {
                $(this).find('.remove-form').show();
            }
        });
    }


    // Add new form dynamically
    $('#add-form').click(function () {
      formCount++;
      let newForm = ``;



      var tipe = $('input[name="tipe"]:checked').val();
      if (tipe == "impor") {
        newForm = `
        <div class="form-item card shadow">
            <div class="card-header" id="heading${formCount}">
              <div class="d-flex align-items-center">
                  <span class="ml-2 mr-3 item-number">Item ${formCount}</span>
                  <hr class="flex-grow-1">
                  <a href="#collapse${formCount}" class="btn btn-info btn-sm item-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse${formCount}">
                    <i class="fas fa-window-minimize"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm remove-form"><i class="fas fa-trash"></i></a>
              </div>
            </div>

            <div id="collapse${formCount}" class="collapse show" aria-labelledby="heading${formCount}" data-parent="#dynamic-form">
              <div class="card-body">
                <div class="row">
                  <!-- Kode HS -->
                  <div class="form-group col-md-4 impor-kode-hs">
                      <label>Kode HS</label>
                      <input type="text" name="kode_hs[]" class="form-control" placeholder="Kode HS" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Seri -->
                  <div class="form-group col-md-4 impor-nomor-seri">
                      <label>Nomor Seri</label>
                      <input type="text" name="nomor_seri[]" class="form-control" placeholder="Nomor Seri" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Lot -->
                  <div class="form-group col-md-4">
                      <label>Nomor Lot </label>
                      <input type="text" name="nomor_lot[]" class="form-control" placeholder="Nomor Lot" style="text-transform: uppercase;">
                  </div>
                  <!-- Bahan -->
                  <div class="form-group col-md-12">
                      <label>Bahan <span class="text-danger">*</span></label>
                      <select name="bahan[${formCount-1}]" class="form-control select2-bahan">
                          <option></option>
                          @foreach ($bahan as $item)
                              <option value="{{$item->uid}}">{{$item->nama}}</option>
                          @endforeach
                      </select>
                      <small id="stok-bahan" style="display: none" class="form-text text-muted"></small>
                  </div>
                  <!-- Jumlah -->
                  <div class="form-group col-md-6 ">
                      <label>Jumlah <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" step=".001" name="jumlah[]" class="form-control" placeholder="Jumlah">
                          <div class="input-group-append" style="display: none">
                              <span class="input-group-text append-satuan"></span>
                          </div>
                      </div>
                  </div>
                  <!-- Jumlah KG (Netto) -->
                  <div class="form-group col-md-12 jumlah-kg" style="display: none;">
                      <label>Jumlah KG (Netto) <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="jumlah_kg[]" class="form-control" step=".001" placeholder="Jumlah">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>
                  <!-- Gudang Penyimpanan -->
                  <div class="form-group col-md-12">
                      <label>Gudang Penyimpanan </label>
                      <select class="form-control select2-gudang" name="gudang_penyimpanan[${formCount-1}]">
                          <option value="" disabled selected>Choose One</option>
                          @foreach ($gudang as $item)
                              <option value="{{$item->uid}}" {{ $item->nama == "Gudang Bahan Baku" ? "selected" : "" }}>{{$item->nama}}</option>
                          @endforeach
                      </select>
                  </div>
                  <!-- Fasilitas -->
                  <div class="form-group col-md-12 impor-fasilitas">
                    <label>Fasilitas</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[${formCount-1}]" id="fasilitas${formCount+1}" value="ya">
                      <label class="form-check-label" for="fasilitas${formCount+1}">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[${formCount-1}]" id="fasilitas${formCount+2}" value="tidak">
                      <label class="form-check-label" for="fasilitas${formCount+2}">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>`;
      } else {
        newForm = `
        <div class="form-item card shadow">
            <div class="card-header" id="heading${formCount}">
              <div class="d-flex align-items-center">
                  <span class="ml-2 mr-3 item-number">Item ${formCount}</span>
                  <hr class="flex-grow-1">
                  <a href="#collapse${formCount}" class="btn btn-info btn-sm item-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse${formCount}">
                    <i class="fas fa-window-minimize"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm remove-form"><i class="fas fa-trash"></i></a>
              </div>
            </div>

            <div id="collapse${formCount}" class="collapse show" aria-labelledby="heading${formCount}" data-parent="#dynamic-form">
              <div class="card-body">
                <div class="row">
                  <!-- Kode HS -->
                  <div class="form-group col-md-4 impor-kode-hs" style="display: none;">
                      <label>Kode HS</label>
                      <input type="text" name="kode_hs[]" class="form-control" placeholder="Kode HS" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Seri -->
                  <div class="form-group col-md-4 impor-nomor-seri" style="display: none;">
                      <label>Nomor Seri</label>
                      <input type="text" name="nomor_seri[]" class="form-control" placeholder="Nomor Seri" style="text-transform: uppercase;">
                  </div>
                  <!-- Nomor Lot -->
                  <div class="form-group col-md-12">
                      <label>Nomor Lot </label>
                      <input type="text" name="nomor_lot[]" class="form-control" placeholder="Nomor Lot" style="text-transform: uppercase;">
                  </div>
                  <!-- Bahan -->
                  <div class="form-group col-md-12">
                      <label>Bahan <span class="text-danger">*</span></label>
                      <select name="bahan[${formCount-1}]" class="form-control select2-bahan">
                          <option></option>
                          @foreach ($bahan as $item)
                              <option value="{{$item->uid}}">{{$item->nama}}</option>
                          @endforeach
                      </select>
                      <small id="stok-bahan" style="display: none" class="form-text text-muted"></small>
                  </div>
                  <!-- Jumlah -->
                  <div class="form-group col-md-12 ">
                      <label>Jumlah <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" step=".001" name="jumlah[]" class="form-control" placeholder="Jumlah">
                          <div class="input-group-append" style="display: none">
                              <span class="input-group-text append-satuan"></span>
                          </div>
                      </div>
                  </div>
                  <!-- Jumlah KG (Netto) -->
                  <div class="form-group col-md-12 jumlah-kg" style="display: none;">
                      <label>Jumlah KG (Netto) <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="jumlah_kg[]" class="form-control" step=".001" placeholder="Jumlah">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>
                  <!-- Gudang Penyimpanan -->
                  <div class="form-group col-md-12">
                      <label>Gudang Penyimpanan </label>
                      <select class="form-control select2-gudang" name="gudang_penyimpanan[${formCount-1}]">
                          <option value="" disabled selected>Choose One</option>
                          @foreach ($gudang as $item)
                              <option value="{{$item->uid}}" {{ $item->nama == "Gudang Bahan Baku" ? "selected" : "" }}>{{$item->nama}}</option>
                          @endforeach
                      </select>
                  </div>
                  <!-- Fasilitas -->
                  <div class="form-group col-md-12 impor-fasilitas" style="display:none;">
                    <label>Fasilitas</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[${formCount-1}]" id="fasilitas${formCount+1}" value="ya">
                      <label class="form-check-label" for="fasilitas${formCount+1}">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="fasilitas[${formCount-1}]" id="fasilitas${formCount+2}" value="tidak">
                      <label class="form-check-label" for="fasilitas${formCount+2}">Tidak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>`;
      }
      // Append the new form to the dynamic form container
      $('#dynamic-form').append(newForm);


        initializeSelect2();
        updateFormNumbers(); // Update numbers and accordion IDs
    });

    // Remove a form when the delete button is clicked
    $(document).on('click', '.remove-form', function () {
        $(this).closest('.form-item').remove(); // Remove the form
        updateFormNumbers(); // Update numbers and accordion IDs
    });

    // Initialize
    updateFormNumbers();
    initializeSelect2();


    // step 3
    
  })
    
  


</script>