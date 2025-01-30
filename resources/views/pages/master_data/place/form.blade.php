<div class="row">
    <div class="form-group col-md-12">
        <label>Nama Tour / Trip</label>
        <input type="text" name="name" class="form-control" placeholder="Nama Tour / Trip" value="{{ @$data->name }}">
    </div>
    <div class="form-group col-md-12">
      <label>Alamat</label>
      <textarea name="address" placeholder="Alamat" class="form-control" id="" cols="30" rows="5">
        {{ @$data->address }}
      </textarea>
    </div>
    <div class="form-group col-md-12">
      <label>Deskripsi</label>
      <textarea name="description" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="5">
        {{ @$data->description }}
      </textarea>
    </div>
    <div class="form-group col-md-12">
      <label>Foto-foto</label>
      <input type="file" name="gallery[]" class="form-control" placeholder="Foto-foto" accept="image/png, image/jpeg" multiple>
    </div>
    
</div>
  