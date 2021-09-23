@extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      General Form Elements
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
            <h3 class="box-title">Quick Example</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          
          {!! Form::model($pages, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\backend\PageController@update',$pages->id],'files'=>true]) !!}
          @include('backend.pages.form', ['submitButtonText' => 'Update'])
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

   
   // Get single article in EditModel
   $('.modelClose').on('click', function(){
    $('#EditPageModal').hide();
  });
   var id;
   $('body').on('click', '#getEditPageData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
              url: "pages/"+id+"/edit",
              method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                  console.log(result);
                  $('#EditPageModalBody').html(result.html);
                  $('#EditPageModal').show();
                }
              });
          });

        // Update article Ajax request.
        $('#SubmitEditPageForm').click(function(e) {
          e.preventDefault();
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "articles/"+id,
            method: 'PUT',
            data: {
              title: $('#editTitle').val(),
              description: $('#editDescription').val(),
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
                  $('#EditPageModal').hide();
                }, 2000);
              }
            }
          });
        });


        
      });
    </script>