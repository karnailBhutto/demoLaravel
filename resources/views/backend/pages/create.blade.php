@extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Page
      <small>Create</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Home</a></li>
      <?php $segments = ''; ?>
      @foreach(Request::segments() as $key=>$segment)
      <?php $segments .= '/'.$segment; ?>
      @if($key > 0)
      <li>
        <a href="{{ $segments }}">{{ ucfirst($segment) }}</a>
      </li>
      @endif
      @endforeach
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Page Create</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          {!! Form::open(['action' => 'App\Http\Controllers\backend\PageController@store','id' => 'form_validation','files'=>true]) !!}
          @include('backend.pages.form', ['submitButtonText' => 'Submit'])
          {!! Form::close() !!}
        </div>

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@stop



<script type="text/javascript">
  $(document).ready(function() {

        // Create article Ajax request.
        $('#SubmitCreatePageForm').click(function(e) {
          e.preventDefault();
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "{{ route('pages.store') }}",
            method: 'post',
            data: {
              title: $('#title').val(),
              description: $('#description').val(),
              body: $('#body').val(),
            },
            success: function(result) {
              if(result.errors) {
                $('.alert-danger').html('');
                $.each(result.errors, function(key, value) {
                  $('.alert-danger').show();
                  $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                });
              } else {
                $('.alert-danger').hide();
                $('.alert-success').show();
                $('.datatable').DataTable().ajax.reload();
                setInterval(function(){ 
                  $('.alert-success').hide();
                  $('#CreatePageModal').modal('hide');
                  location.reload();
                }, 2000);
              }
            }
          });
        });

        
      });
    </script>