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
          <label>Customer <span class="text-danger">*</span></label>
          <select name="customer" class="form-control select2-customer" id="customer">
            <option></option>
            @foreach ($customer as $item)
                <option value="{{$item->uid}}" data-negara="{{ $item->negara }}" {{ $data->customer->uid == $item->uid ? "selected" : "" }}>{{$item->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Nomor Invoice <span class="text-danger">*</span></label>
          <input type="text" name="nomor_invoice" class="form-control" placeholder="Nomor Invoice" style="text-transform: uppercase;" value="{{ strtoupper($data->nomor_invoice) }}">
        </div>
        <div class="form-group col-md-6 ">
          <label>Tanggal Invoice <span class="text-danger">*</span></label>
          <div class='date'>
              <input type='text' class="form-control" name="tanggal_invoice" id='tanggal_invoice' style="background-color: white; " placeholder="Pilih Tanggal Invoice" value="{{ $data->tanggal_invoice }}" />
          </div>
        </div>
        <div class="form-group col-md-6">
          <label>Nomor SPPB <span class="text-danger">*</span></label>
          <input type="text" name="nomor_sppb" class="form-control" placeholder="Nomor SPPB" style="text-transform: uppercase;" value="{{ $data->nomor_sppb }}">
        </div>
        <div class="form-group col-md-6 ">
          <label>Tanggal SPPB <span class="text-danger">*</span></label>
          <div class='date'>
              <input type='text' class="form-control" name="tanggal_sppb" id='tanggal_sppb' style="background-color: white; " placeholder="Pilih Tanggal SPPB" value="{{ $data->tanggal_sppb }}" />
          </div>
        </div>
        <div class="form-group col-md-12" >
          <label>Nilai <span class="text-danger">*</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">IDR</span>
            </div>
              <input type="number" name="nilai" class="form-control" step=".01" placeholder="Nilai" value="{{ $data->nilai }}">
          </div>
        </div>
        
      </div>
    </div>
    <div class="step-body" data-tab="2" style="display: none;">
      <div class="col-md-10 mx-auto mb-5">
        <div id="dynamic-form">
          <!-- Original Form -->
          @foreach ($wasteKeluarItems as $k => $wasteItem)
          @php $key = $wasteItem->index @endphp
          <div class="form-item card shadow">
            <input type="hidden" name="waste_item_uid[]" value="{{ $wasteItem->uid }}">
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
                  <!-- Jenis Waste -->
                  <div class="form-group col-md-12">
                    <label>Jenis Waste <span class="text-danger">*</span></label>
                    <select name="jenis_waste[{{$key}}]" class="form-control select2-jenis-waste">
                      <option></option>
                      @foreach ($jenisWaste as $item)
                          <option value="{{$item->uid}}" {{ $wasteItem->jenis == $item->nama ? "selected" : "" }} >{{$item->nama}} </option>
                      @endforeach
                    </select>
                  </div>
                  <!-- Waste -->
                  <div class="form-group col-md-12">
                    <label>Waste <span class="text-danger">*</span></label>
                    <select name="waste[{{$key}}]" class="form-control select2-waste">
                      <option></option>
                      @foreach ($waste as $item)
                          <option value="{{$item->uid}}" {{ $wasteItem->waste_uid == $item->uid ? "selected" : "" }} >{{$item->nama}} </option>
                      @endforeach
                    </select>
                  </div>
                  <!-- Nomor PIB -->
                  <div class="form-group col-md-12 ">
                      <label>Nomor PIB <span class="text-danger">*</span></label>
                      <input type="text" name="nomor_pib[]" class="form-control" placeholder="Nomor PIB" style="text-transform: uppercase" value="{{$wasteItem->nomor_pib}}">
                  </div>
                  <div class="form-group col-md-12">
                      <label for="qty">Qty <span class="text-danger">*</span></label>
                      <input type="number" name="qty[]" class="form-control" placeholder="Quantity" value="{{ $wasteItem->qty }}">
                  </div>
          
                  <table class="table table-bordered qty-table" data-index="{{$key}}">
                      <thead>
                          <tr>
                              <th>Nomor Packing</th>
                              <th>Jumlah (KGM)</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                            $nomorPacking = explode(',', $wasteItem->nomor_packing);
                            $jumlahKgm = explode(',',$wasteItem->jumlah);
                        @endphp
                        @foreach ($nomorPacking as $index => $item)
                        <tr>
                            <td><input type="text" name="nomor_packing[{{$key}}][{{$index}}]" class="form-control" placeholder="Nomor Packing" value="{{$item}}"></td>
                            <td><input type="number" step=".01" name="jumlah_kgm[{{$key}}][{{$index}}]"  class="form-control jumlah-kgm" placeholder="Jumlah (KGM)" value="{{$jumlahKgm[$index]}}" ></td>
                        </tr>
                        @endforeach
                          <!-- Dynamic rows will be appended here -->
                      </tbody>
                  </table>
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
                      <td>Customer</td>
                      <td>:</td>
                      <th class="customer">Customer</th>
                  </tr>
                  <tr>
                      <td>Nomor Invoice</td>
                      <td>:</td>
                      <th class="nomor-invoice">Nomor Invoice</th>
                  </tr>
                  <tr>
                      <td>Tanggal Invoice</td>
                      <td>:</td>
                      <th class="tanggal-invoice">Tanggal Invoice</th>
                  </tr>
                  <tr>
                      <td>Nomor SPPB</td>
                      <td>:</td>
                      <th class="nomor-sppb">Nomor SPPB</th>
                  </tr>
                  <tr>
                      <td>Tanggal SPPB</td>
                      <td>:</td>
                      <th class="tanggal-sppb">Tanggal SPPB</th>
                  </tr>
                  <tr>
                      <td>Nilai</td>
                      <td>:</td>
                      <th class="nilai">Tanggal SPPB</th>
                  </tr>
              </tbody>
          </table>

          <div class="py-2">
            <h5>Informasi Item</h5>
            <div class="row" id="list-items">
            </div>
          </div>
      </div>
      
    </div>
</div>

<script>
  // Collect and display data from Step 1 and Step 2 to Step 3
  function collectAndDisplayData() {
      // Collect data from Step 1
      var nomor_invoice = $('input[name="nomor_invoice"]').val();
      var tanggal_invoice = $('input[name="tanggal_invoice"]').val();
      var nomor_sppb = $('input[name="nomor_sppb"]').val();
      var tanggal_sppb = $('input[name="tanggal_sppb"]').val();
      var nilai = $('input[name="nilai"]').val();
      
      // Update Step 3 fields
      $('th.nomor-invoice').text(nomor_invoice.toUpperCase());
      $('th.tanggal-invoice').text(tanggal_invoice);
      $('th.nomor-sppb').text(nomor_sppb.toUpperCase());
      $('th.tanggal-sppb').text(tanggal_sppb);
      $('th.nilai').text(nilai);

      // Collect and display dynamic data from Step 2 (loop through forms)
      
      $("#list-items").empty();

      $('#dynamic-form .form-item').each(function(index) {
          var jenis_waste = $(this).find(`select[name="jenis_waste[${index}]"]`).select2('data')[0].text;
          var waste = $(this).find(`select[name="waste[${index}]"]`).select2('data')[0].text;
          var nomor_pib = $(this).find('input[name="nomor_pib[]"]').val();
          var qty = $(this).find('input[name="qty[]"]').val();
          var nomor_packing = '';
          var jumlah_kgm = '';

          var nomor_packing_data = []; // Store all nomor_packing entries for this row
          var jumlah_kgm_data = [];    // Store all jumlah_kgm entries for this row

          // Loop through each row of the qty-table to collect nomor_packing and jumlah_kgm
          $(this).find('table.qty-table tbody tr').each(function(jindex) {
              var nomor_packing = $(this).find('input[name="nomor_packing[' + index + '][' + jindex + ']"]').val();
              var jumlah_kgm = $(this).find('input[name="jumlah_kgm[' + index + '][' + jindex + ']"]').val();
              
              if (nomor_packing) { // Ensure there's a value before adding
                  nomor_packing_data.push(nomor_packing);
                  jumlah_kgm_data.push(jumlah_kgm);
              }
          });

          var bodyItem = `
          <div class="card shadow col-md-6">
            <div class="card-body">
              <h4>Data ${index+1}</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive py-2">
                    <table class="table align-items-center table-flush table-header" style="width: 100% !important;">
                      <tbody>
                        <tr>
                          <td>Jenis Waste</td>
                          <td> : </td>
                          <td> ${jenis_waste} </td>
                        </tr>
                        <tr>
                          <td>Waste</td>
                          <td> : </td>
                          <td> ${waste}</td>
                        </tr>
                        <tr>
                          <td>Nomor PIB</td>
                          <td> : </td>
                          <td>${nomor_pib}</td>
                        </tr>
                        <tr>
                          <td>Qty</td>
                          <td> : </td>
                          <td>${qty}</td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table table-bordered table-info table-striped mt-2">
                        <thead>
                            <tr>
                                <th>Nomor Packing</th>
                                <th>Jumlah (KGM)</th>
                            </tr>
                        </thead>
                        <tbody>
          `;

          nomor_packing_data.forEach(function(nomor_packing, i) {
            bodyItem += `<tr>
              <td>${nomor_packing}</td>
              <td>${jumlah_kgm_data[i]}</td>
              </tr>`;
          });

          bodyItem += `
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          `;


          // $('#table-wastekeluar-ringkasan thead tr').empty(); // Clear existing headers
          // $('#table-wastekeluar-ringkasan thead tr').append(`
          //     <th></th>
          //     <th class="all">Jenis Waste</th>
          //     <th class="all">Waste</th>
          //     <th class="all">Nomor PIB</th>
          //     <th class="all">Qty</th>
          // `);
          
          // // Add headers for each nomor_packing dynamically
          // nomor_packing_data.forEach(function(nomor_packing, i) {
          //     $('#table-wastekeluar-ringkasan thead tr').append(`
          //         <th class="none">Nomor Packing ${nomor_packing} : </th>
          //     `);
          // });

          // // Construct the tbody row with collected data
          // var tbody = `
          //     <tr>
          //         <td></td>
          //         <td>${jenis_waste}</td>
          //         <td>${waste}</td>
          //         <td>${nomor_pib}</td>
          //         <td>${qty}</td>
          // `;

          // // Append the collected nomor_packing and jumlah_kgm data to the tbody row
          // jumlah_kgm_data.forEach(function(jumlah_kgm, i) {
          //     tbody += `<td>${jumlah_kgm} KGM</td>`;
          // });

          // tbody += `</tr>`;

          // Append the collected data to the table in Step 3
          // $('#table-wastekeluar-ringkasan tbody').append(tbody);
          $("#list-items").append(bodyItem)
      });
      
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

    let validateCustomer = $('[name="customer"]').val()
    if (!validateCustomer) {
      kosong += '<li>Kolom Customer Wajib Diisi</li>'
    }

    let validateNomorInvoice = $('[name="nomor_invoice"]').val()
    if (!validateNomorInvoice) {
      kosong += '<li>Kolom Nomor Invoice Wajib Diisi</li>'
    }

    let validateTanggalInvoice = $('[name="tanggal_invoice"]').val()
    if (!validateTanggalInvoice) {
      kosong += '<li>Kolom Tanggal Invoice Wajib Diisi</li>'
    }

    let validateNomorSPPB = $('[name="nomor_sppb"]').val()
    if (!validateNomorSPPB) {
      kosong += '<li>Kolom Nomor SPPB Wajib Diisi</li>'
    }

    let validateTanggalSPPB = $('[name="tanggal_sppb"]').val()
    if (!validateTanggalSPPB) {
      kosong += '<li>Kolom Tanggal SPPB Wajib Diisi</li>'
    }

    let validateNilai = $('[name="nilai"]').val()
    if (!validateNilai) {
      kosong += '<li>Kolom Nilai Wajib Diisi</li>'
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
      let jenisWasteValue = $(this).find('.form-group select[name="jenis_waste['+index+']"]').val()
      if (!jenisWasteValue) {  // If the field is empty
        kosong += `<li>Kolom Jenis Waste pada data ke - ${index + 1} wajib diisi</li>`;
      } 

      let wasteValue = $(this).find('.form-group select[name="waste['+index+']"]').val()
      if (!wasteValue) {  // If the field is empty
        kosong += `<li>Kolom Waste pada data ke - ${index + 1} wajib diisi</li>`;
      } 
      // else {
      //   let stok = $(this).find('.form-group #stok-bahan').attr("data-stok");
      //   if (parseFloat(stok) < 1) {
      //     kosong += `<li>Stok Barang pada data ke - ${index + 1} belum tersedia</li>`;
      //   }
      // }
    });

    $('[name="nomor_pib[]"]').each(function(index) {
      let nomorPibValue = $(this).val(); // Get the value of the current field
      
      if (!nomorPibValue) {  // If the field is empty
        kosong += `<li>Kolom Nomor PIB pada data ke - ${index + 1} wajib diisi</li>`;
      }
    });

    $('[name="qty[]"]').each(function(index) {
      let qtyValue = $(this).val(); // Get the value of the current field
      
      if (!qtyValue) {  // If the field is empty
        kosong += `<li>Kolom qty pada data ke - ${index + 1} wajib diisi</li>`;
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
    $('#tanggal_invoice').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })
    $('#tanggal_sppb').flatpickr({
      static: true,
      dateFormat: "Y-m-d",
    })

    function parseFixed(form, zero) {
      var kursValue = form.val(); // Get the input value
      var kursFloat = parseFloat(kursValue); // Convert to float
      if (isNaN(kursFloat)) {
        $(this).val(''); // Optionally clear the input if it's not a valid number
      } else {
        form.val(kursFloat.toFixed(zero) || ''); // Use an empty string if it's NaN
      }
    }

    function formatResultCustomer(res) {
      if (!res.id) {
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

        var negara = $(res.element).data('negara');
        $container.find(".select2-result-repository__title").text(res.text || '-');
        $container.find(".select2-result-repository__description").html(negara || '-');

        return $container
    }

    function formatSelectionCustomer(res) {
      return res.text;
    }

    
    function formatResult(res) {
      if (!res.id) {
        return res.text;
      }
      var $container = $(
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='"+ base_url+'img/default-waste.png'+"'/></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'></div>" +
              "<div class='select2-result-repository__description'></div>" +
            "</div>" +
          "</div>"
        );

        $container.find(".select2-result-repository__title").text(res.text || '-');
        $container.find(".select2-result-repository__description").html('');

        return $container
    }

    function formatSelection(res) {
      return res.text;
    }

    function formatResultJenisWaste(res) {
      if (!res.id) {
        return res.text;
      }
      var $container = $(
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='"+ base_url+'img/default-jenis-waste.png'+"'/></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'></div>" +
              "<div class='select2-result-repository__description'></div>" +
            "</div>" +
          "</div>"
        );

        $container.find(".select2-result-repository__title").text(res.text || '-');
        $container.find(".select2-result-repository__description").html('');

        return $container
    }

    function formatSelectionJenisWaste(res) {
      return res.text;
    }

    let initializeSelect2 =  function() {
      $('.select2-customer').select2({
          placeholder: "Pilih Customer", // Optional placeholder
          allowClear: true, // Allows the user to clear the selection
          templateResult: formatResultCustomer,  // Custom result format
          templateSelection: formatSelectionCustomer // Custom selected item format
      });

      $('.select2-waste').select2({
          placeholder: "Pilih Waste", // Optional placeholder
          allowClear: true, // Allows the user to clear the selection
          templateResult: formatResult,  // Custom result format
          templateSelection: formatSelection // Custom selected item format
      });
      $('.select2-jenis-waste').select2({
          placeholder: "Pilih Jenis Waste", // Optional placeholder
          allowClear: true, // Allows the user to clear the selection
          templateResult: formatResultJenisWaste,  // Custom result format
          templateSelection: formatSelectionJenisWaste // Custom selected item format
      });

    }

    $(document).on('blur', 'input[name="nilai"]', function () {
        parseFixed($(this),2);
    });

    

    // step 2

    var formCount = $('#dynamic-form .form-item').length; // Counter for form numbering



    $(document).on('blur', 'input[name="jumlah[]"]', function () {
        parseFixed($(this),3);
    });
    $(document).on('blur', 'input[name="qty[]"]', function () {
        var qty = parseInt($(this).val());
        if (!isNaN(qty) && qty > 0) {
          var table = $(this).closest('.form-group').next('table.qty-table')
          var dtIndex = table.data('index');
          table.find('tbody').empty();
          for (var i = 0; i < qty; i++) {
            table.find('tbody').append(`
                  <tr>
                      <td><input type="text" name="nomor_packing[${dtIndex}][${i}]" class="form-control" placeholder="Nomor Packing"></td>
                      <td><input type="number" step=".01" name="jumlah_kgm[${dtIndex}][${i}]"  class="form-control jumlah-kgm" placeholder="Jumlah (KGM)" ></td>
                  </tr>
              `);
          }
        }
    });


    $(document).on('blur', '.jumlah-kgm', function () {
        parseFixed($(this), 2);
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
                  <!-- Jenis Waste -->
                  <div class="form-group col-md-12">
                    <label>Jenis Waste <span class="text-danger">*</span></label>
                    <select name="jenis_waste[${formCount-1}]" class="form-control select2-jenis-waste">
                      <option></option>
                      @foreach ($jenisWaste as $item)
                          <option value="{{$item->uid}}" >{{$item->nama}} </option>
                      @endforeach
                    </select>
                  </div>
                  <!-- Waste -->
                  <div class="form-group col-md-12">
                    <label>Waste <span class="text-danger">*</span></label>
                    <select name="waste[${formCount-1}]" class="form-control select2-waste">
                      <option></option>
                      @foreach ($waste as $item)
                          <option value="{{$item->uid}}" >{{$item->nama}} </option>
                      @endforeach
                    </select>
                  </div>
                  <!-- Nomor PIB -->
                  <div class="form-group col-md-12 ">
                      <label>Nomor PIB <span class="text-danger">*</span></label>
                      <input type="text" name="nomor_pib[]" class="form-control" placeholder="Nomor PIB" style="text-transform:uppercase">
                  </div>
                  <div class="form-group col-md-12">
                      <label for="qty">Qty <span class="text-danger">*</span></label>
                      <input type="number" name="qty[]" class="form-control" placeholder="Quantity">
                  </div>
          
                  <table class="table table-bordered qty-table" data-index="${formCount-1}">
                      <thead>
                          <tr>
                              <th>Nomor Packing</th>
                              <th>Jumlah (KGM)</th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Dynamic rows will be appended here -->
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>`;

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