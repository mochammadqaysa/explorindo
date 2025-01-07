<div class="row">
    <div class="form-group col-md-12">
      <label>Nama Customer <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Customer" value="{{ @$data->nama }}">
    </div>    
    <div class="form-group col-md-12">
      <label>Kode Customer</label>
      <input type="text" name="kode_cust" class="form-control" placeholder="Kode Customer" value="{{ @$data->kode_cust }}">
    </div>    
    <div class="form-group col-md-6">
      <label>Email Customer</label>
      <input type="text" name="email" class="form-control" placeholder="Email Customer" value="{{ @$data->email }}">
    </div>
    <div class="form-group col-md-6">
      <label>Nomor Telpon</label>
      <input type="number" name="no_telpon" class="form-control" placeholder="Nomor Telpon" value="{{ @$data->no_telpon }}">
    </div>
    <div class="form-group col-md-12">
      <label>PIC</label>
      <input type="text" name="pic" class="form-control" placeholder="Person In Charge" value="{{ @$data->pic }}">
    </div>
    <div class="form-group col-md-12">
      <label>Alamat <span class="text-danger">*</span></label>
      <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control">{{ @$data->alamat }}</textarea>
    </div>
    <div class="form-group col-md-12">
      <label>Tipe <span class="text-danger">*</span></label><br>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="tipe1" {{ @$data->tipe == 'ekspor' ? 'checked' : '' }} name="tipe" class="custom-control-input" value="ekspor">
        <label class="custom-control-label" for="tipe1">Ekspor</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="tipe2" {{ @$data->tipe == 'lokal' ? 'checked' : '' }} name="tipe" class="custom-control-input" value="lokal">
        <label class="custom-control-label" for="tipe2">Lokal</label>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label>Negara <span class="text-danger">*</span></label>
      <input type="text" name="negara" id="negara" class="form-control" placeholder="Negara" value="{{ @$data->negara }}">
    </div>
</div>

<script>
  $(() => {
    function updateNegaraField() {
        var tipe = $('input[name="tipe"]:checked').val();
        var $negaraInput = $('#negara');
        
        if (tipe === 'lokal') {
            $negaraInput.val('INDONESIA').prop('readonly', true);
        } else if (tipe === 'ekspor') {
            $negaraInput.val('{{ @$data->negara }}').prop('readonly', false);
        }
    }

    updateNegaraField();

    $('input[name="tipe"]').change(function() {
        updateNegaraField();
    });
  })
</script>