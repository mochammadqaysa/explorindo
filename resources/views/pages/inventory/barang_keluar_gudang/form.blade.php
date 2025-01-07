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
            <input type="radio" id="tipe2" checked name="tipe" class="custom-control-input" value="lokal">
            <label class="custom-control-label" for="tipe2">Lokal</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="tipe1"  name="tipe" class="custom-control-input" value="ekspor">
            <label class="custom-control-label" for="tipe1">Ekspor</label>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label>Customer Penerima <span class="text-danger">*</span></label>
          <select name="customer" class="form-control select2-customer" id="customer">
            <option></option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Nomor Surat Jalan <span class="text-danger">*</span></label>
          <input type="text" name="nomor_sj" class="form-control" placeholder="Nomor Surat Jalan" style="text-transform:uppercase">
        </div>
        <div class="form-group col-md-6 ">
          <label>Tanggal Surat Jalan <span class="text-danger">*</span></label>
          <div class='date'>
              <input type='text' class="form-control" name="tanggal_sj" id='tanggal_sj' style="background-color: white; " placeholder="Pilih Tanggal Surat Jalan" value="" />
          </div>
        </div>
        
      </div>
    </div>
    <div class="step-body" data-tab="2" style="display: none;">
      <div class="col-md-10 mx-auto mb-5">
        <div id="dynamic-form">
          <!-- Original Form -->
          <div class="form-item card shadow">
            <div class="card-header" id="heading1">
              <div class="d-flex align-items-center">
                  <span class="ml-2 mr-3 item-number">Item 1</span>
                  <hr class="flex-grow-1">
                  <a href="#collapse1" class="btn btn-info btn-sm item-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1">
                    <i class="fas fa-window-minimize"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm remove-form" style="display: none"><i class="fas fa-trash"></i></a>
              </div>
            </div>
  
            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#dynamic-form">
              <div class="card-body">
                <div class="row">
                  
                  <!-- Barang -->
                  <div class="form-group col-md-12">
                    <label>Barang <span class="text-danger">*</span></label>
                    <select name="barang[0]" class="form-control select2-barang">
                      <option></option>
                      @foreach ($barang as $item)
                          <option value="{{$item->uid}}" data-warna="{{$item->warna}}" data-panjang="{{$item->panjang}}" data-lebar="{{$item->lebar}}" data-tebal="{{$item->tebal}}" data-satuan="{{$item->satuan}}">{{$item->nama}} {{$item->warna}} {{$item->panjang}} x {{$item->lebar}} x {{$item->tebal}}</option>
                      @endforeach
                    </select>
                    <small id="stok-bahan" style="display: none" class="form-text text-muted"></small>
                  </div>
                  <!-- Jumlah -->
                  <div class="form-group col-md-12 ">
                      <label>Jumlah <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                          <div class="input-group-append" style="display: none">
                              <span class="input-group-text append-satuan"></span>
                          </div>
                      </div>
                  </div>
                  <!-- (Netto) -->
                  <div class="form-group col-md-6 " style="">
                      <label>Netto <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="netto[]" class="form-control" step=".001" placeholder="Netto">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>
                  <!-- Bruto -->
                  <div class="form-group col-md-6 " style="">
                      <label>Bruto <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="bruto[]" class="form-control" step=".001" placeholder="Bruto">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>

                  
                </div>
              </div>
            </div>
          </div>
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
                      <td>Nomor Surat Jalan</td>
                      <td>:</td>
                      <th class="nomor-sj">Nomor Surat Jalan</th>
                  </tr>
                  <tr>
                      <td>Tanggal Surat jalan</td>
                      <td>:</td>
                      <th class="tanggal-sj">Tanggal</th>
                  </tr>
                  <tr>
                      <td>Customer</td>
                      <td>:</td>
                      <th class="customer">Customer</th>
                  </tr>
                  <tr>
                      <td>Negara Tujuan</td>
                      <td>:</td>
                      <th class="negara">Negara</th>
                  </tr>
              </tbody>
          </table>

          <div class="py-2">
            <h5>Informasi Item</h5>
              <table class="table table-responsive display nowrap" style="width:100%" id="table-barangkeluar-ringkasan">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th class="all">Nama Barang</th>
                          <th class="none">Jumlah</th>
                          <th class="none">Bruto</th>
                          <th class="none">Netto</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
          </div>
      </div>
      
    </div>
</div>

<script>
  // Collect and display data from Step 1 and Step 2 to Step 3
  function collectAndDisplayData() {
      // Collect data from Step 1
      var customer = $("#customer").select2('data')[0].nama;
      var negara = $("#customer").select2('data')[0].negara;
      var nomor_sj = $('input[name="nomor_sj"]').val().toUpperCase();
      var tipe = $('input[name="tipe"]:checked').val();
      var tanggal_sj = $('input[name="tanggal_sj"]').val();
      
      // Update Step 3 fields
      $('th.customer').html(`${customer} <span class="badge badge-default">${tipe}</span>`);
      $('th.negara').text(negara);
      $('th.nomor-sj').text(nomor_sj.toUpperCase());
      $('th.tanggal-sj').text(tanggal_sj);

      // Collect and display dynamic data from Step 2 (loop through forms)
      $('#table-barangkeluar-ringkasan tbody').empty(); // Clear table body

      $('#dynamic-form .form-item').each(function(index) {
          var barang = $(this).find(`select[name="barang[${index}]"]`).select2('data')[0].text;
          var jumlah = $(this).find('input[name="jumlah[]"]').val();
          var satuan = $(this).find('.append-satuan').text();
          var bruto = $(this).find('input[name="bruto[]"]').val();
          var netto = $(this).find('input[name="netto[]"]').val();

          // Append the collected data to the table in Step 3
          $('#table-barangkeluar-ringkasan tbody').append(`
              <tr>
                  <td>${index + 1}</td>
                  <td>${barang}</td>
                  <td>${jumlah} ${satuan}</td>
                  <td>${bruto}</td>
                  <td>${netto}</td>
              </tr>
          `);
      });

      if (tipe == "lokal") {

        $('#table-barangkeluar-ringkasan th:nth-child(7)').show();
        $('#table-barangkeluar-ringkasan td:nth-child(7)').show();
        $('#table-barangkeluar-ringkasan th:nth-child(8)').show();
        $('#table-barangkeluar-ringkasan td:nth-child(8)').show();
      } else {

        $('#table-barangkeluar-ringkasan th:nth-child(7)').hide();
        $('#table-barangkeluar-ringkasan td:nth-child(7)').hide();
        $('#table-barangkeluar-ringkasan th:nth-child(8)').hide();
        $('#table-barangkeluar-ringkasan td:nth-child(8)').hide();
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

    let validateNomorSJ = $('[name="nomor_sj"]').val()
    if (!validateNomorSJ) {
      kosong += '<li>Kolom Nomor Surat Jalan Wajib Diisi</li>'
    }

    let validateTanggalSJ = $('[name="tanggal_sj"]').val()
    if (!validateTanggalSJ) {
      kosong += '<li>Kolom Tanggal Surat Jalan Wajib Diisi</li>'
    }

    let validateCustomer = $('[name="customer"]').val()
    if (!validateCustomer) {
      kosong += '<li>Kolom Customer Wajib Diisi</li>'
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
    $('#dynamic-form .form-item').each(function (index) {
      let barangValue = $(this).find('.form-group select[name="barang['+index+']"]').val()
      if (!barangValue) {  // If the field is empty
        kosong += `<li>Kolom Barang pada data ke - ${index + 1} wajib diisi</li>`;
      } else {
        let stok = $(this).find('.form-group #stok-bahan').attr("data-stok");
        if (parseFloat(stok) < 1) {
          kosong += `<li>Stok Barang pada data ke - ${index + 1} belum tersedia</li>`;
        }
      }
    });

    $('[name="jumlah[]"]').each(function(index) {
      let jumlahValue = $(this).val(); // Get the value of the current field
      
      if (!jumlahValue) {  // If the field is empty
        kosong += `<li>Kolom Jumlah pada data ke - ${index + 1} wajib diisi</li>`;
      } else {
        var maximum = $(this).attr('max')
        if (parseFloat(jumlahValue) > parseFloat(maximum)) {
          // $(this).addClass('is-invalid'); 
          kosong += `<li>Kolom Jumlah pada data ke - ${index + 1} maksimal diisi ${maximum}</li>`;
        }
      }
    });

    $('[name="bruto[]"]').each(function(index) {
      if ($(this).is(":visible")) {
        let jumlahKgValue = $(this).val(); // Get the value of the current field
        
        if (!jumlahKgValue) {  // If the field is empty
          kosong += `<li>Kolom Bruto pada data ke - ${index + 1} wajib diisi</li>`;
        }
      }
    });

    $('[name="netto[]"]').each(function(index) {
      if ($(this).is(":visible")) {
        let jumlahKgValue = $(this).val(); // Get the value of the current field
        
        if (!jumlahKgValue) {  // If the field is empty
          kosong += `<li>Kolom Netto pada data ke - ${index + 1} wajib diisi</li>`;
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
    $('#tanggal_sj').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })

    let _urls = {
      customer: `{{ route('select2.customer') }}`,
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
    function loadCustomers(tipe) {
        $('#customer').select2({
        ajax: {
          url: _urls.customer,
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
        console.log(selectedTipe);
        $('#customer').val(null).trigger('change'); 
        loadCustomers(selectedTipe); 
    });

    var initialTipe = $('input[name="tipe"]:checked').val();
    if (initialTipe) {
        loadCustomers(initialTipe);
        // $('#supplier').removeAttr("disabled");
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


    // step 2

    var formCount = 1; // Counter for form numbering

    function formatResultBarang(res) {
      if (!res.id) {
        return res.text;
      }
      var $container = $(
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='"+ base_url+'img/default-barang.png'+"'/></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'></div>" +
              "<div class='select2-result-repository__description'></div>" +
            "</div>" +
          "</div>"
        );

        var warna = $(res.element).data('warna');
        var panjang = $(res.element).data('panjang');
        var lebar = $(res.element).data('lebar');
        var tebal = $(res.element).data('tebal');
        var satuan = $(res.element).data('satuan');
        $container.find(".select2-result-repository__title").text(res.text || '-');
        $container.find(".select2-result-repository__description").html(warna ? `Warna : ${warna} <br> Dimensi : ${panjang} x ${lebar} x ${tebal} <br> Satuan : ${satuan}` : '-');

        return $container
    }

    function formatSelectionBarang(res) {
      return res.text;
    }

    let initializeSelect2 =  function() {
      $('.select2-barang').select2({
          placeholder: "Pilih Barang", // Optional placeholder
          allowClear: true, // Allows the user to clear the selection
          templateResult: formatResultBarang,  // Custom result format
          templateSelection: formatSelectionBarang // Custom selected item format
      });

      $(".select2-barang").change(function() {
          var barang = $(this).val(); // Get the selected value
          if (barang) {
              $.ajax({
                  url: `{{route('barang.info')}}`,  // Replace with your controller URL
                  method: 'POST',
                  data: {
                      'barang': barang // Send selected bahan ID to the server
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
                        $(this).closest('.form-item').find('.form-group #stok-bahan').attr("data-stok",res.data.stok);
                        $(this).closest('.form-item').find('input[name="jumlah[]"]').attr("max", res.data.stok);
                        
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

    $(document).on('blur', 'input[name="bruto[]"]', function () {
        parseFixed($(this),3);
    });
    $(document).on('blur', 'input[name="netto[]"]', function () {
        parseFixed($(this),3);
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
                  <!-- Barang -->
                  <div class="form-group col-md-12">
                    <label>Barang <span class="text-danger">*</span></label>
                    <select name="barang[${formCount-1}]" class="form-control select2-barang">
                      <option></option>
                      @foreach ($barang as $item)
                          <option value="{{$item->uid}}" data-warna="{{$item->warna}}" data-panjang="{{$item->panjang}}" data-lebar="{{$item->lebar}}" data-tebal="{{$item->tebal}}" data-satuan="{{$item->satuan}}">{{$item->nama}} {{$item->warna}} {{$item->panjang}} x {{$item->lebar}} x {{$item->tebal}}</option>
                      @endforeach
                    </select>
                    <small id="stok-bahan" style="display: none" class="form-text text-muted"></small>
                  </div>
                  <!-- Jumlah -->
                  <div class="form-group col-md-12 ">
                      <label>Jumlah <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                          <div class="input-group-append" style="display: none">
                              <span class="input-group-text append-satuan"></span>
                          </div>
                      </div>
                  </div>
                  <!-- (Netto) -->
                  <div class="form-group col-md-6 " style="">
                      <label>Netto <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="netto[]" class="form-control" step=".001" placeholder="Netto">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>
                  <!-- Bruto -->
                  <div class="form-group col-md-6 " style="">
                      <label>Bruto <span class="text-danger">*</span></label>
                      <div class="input-group">
                          <input type="number" name="bruto[]" class="form-control" step=".001" placeholder="Bruto">
                          <div class="input-group-append">
                              <span class="input-group-text">KG</span>
                          </div>
                      </div>
                  </div>

                  
              </div>
            </div>
          </div>
      </div>`;

      var tipe = $('input[name="tipe"]:checked').val();
      var htmlObject = $(newForm)

      // Append the new form to the dynamic form container
      $('#dynamic-form').append(htmlObject);


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