@extends('layouts.root')

@section('title', 'Piutang')

@section('breadcrum')
<div class="col-lg-6 col-7">
  <h6 class="h2 text-white d-inline-block mb-0">Accounting</h6>
  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
      <li class="breadcrumb-item"><a href="#"><i class="fas fa-comment-dollar"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page">Piutang</li>
    </ol>
  </nav>
</div>
@endsection

@section('page')
<div class="row">
  <div class="col-xl-12 order-xl-1">
    <div class="card">
      <div class="card-body">
        {{-- @include('admin.alert') --}} 
        <div class="table-responsive py-2">
          {!! $dataTable->table(['class' => 'table dt_table table-flush table-vertical-align']) !!}
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

{!! $dataTable->scripts() !!}
<script>
  let _url = {
    create: `{{ route('piutang.create') }}`,
    edit: `{{ route('piutang.edit', ':id') }}`,
    pelunasan: `{{ route('piutang.pelunasan', ':id') }}`,
    show: `{{ route('piutang.show', ':id') }}`,
    destroy: `{{ route('piutang.destroy', ':id') }}`,
    history_reminder: `{{ route('piutang.history-reminder', ':id') }}`
  }

  function pelunasan(id){
    Ryuna.blockUI()
    $.get(_url.pelunasan.replace(':id', id)).done((res) => {
      Ryuna.large_modal()
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }

  function save(){
    $('#response_container').empty();
    Ryuna.blockElement('.modal-content');
    let el_form = $('#myForm')
    let target = el_form.attr('action')
    let formData = new FormData(el_form[0])
  
    $.ajax({
      url: target,
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',
    }).done((res) => {
      if(res?.status == true){
        let html = '<div class="alert alert-success alert-dismissible fade show">'
        html += `${res?.message}`
        html += '</div>'
        Ryuna.noty('success', '', res?.message)
        $('#response_container').html(html)
        Ryuna.unblockElement('.modal-content')
  
        if($('[name="_method"]').val() == undefined) {
          el_form[0].reset()
        }
        window.LaravelDataTables["piutang-table"].draw()
        Ryuna.close_modal()
      }
    }).fail((xhr) => {
      if(xhr?.status == 422){
        let errors = xhr.responseJSON.errors
        for(let key in errors){
          $(`input[name=${key}]`).addClass('is-invalid')
          $('#validate_'+key).html(errors[key])
        }
        Ryuna.unblockElement('.modal-content')
      }else{
        let html = '<div class="alert alert-danger alert-dismissible fade show">'
        html += `${xhr?.responseJSON?.message}`
        html += '</div>'
        Ryuna.noty('error', '', xhr?.responseJSON?.message)
        $('#response_container').html(html)
        Ryuna.unblockElement('.modal-content')
      }
    })
  }
  
  function destroy(id){
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak dapat mengembalikan data yang sudah terhapus",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#007bff',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      console.log(result)
      if (result.value) {
        $.ajax({
          url: _url.destroy.replace(':id', id),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'DELETE',
        }).done((res) => {
          Swal.fire({
            title: res.message,
            text: '',
            type: 'success',
            confirmButtonColor: '#007bff'
          })
        window.LaravelDataTables["piutang-table"].draw()
        }).fail((xhr) => {
          Swal.fire({
            title: xhr.responseJSON.message,
            text: '',
            type: 'error',
            confirmButtonColor: '#007bff'
          })
        })
      }
    })
  }

  function show(id) {
    Ryuna.blockUI()
    $.get(_url.show.replace(':id', id)).done((res) => {
      Ryuna.large_modal()
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }

  function history_reminder(id) {
    Ryuna.blockUI()
    $.get(_url.history_reminder.replace(':id', id)).done((res) => {
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }

  function create(){
    Ryuna.blockUI()
    $.get(_url.create).done((res) => {
      Ryuna.large_modal()
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }
</script>
@endsection