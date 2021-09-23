@extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
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
      <div class="col-xs-12">

        <!-- /.box -->
        @include('backend.flash-message')
        <div class="box">
          <div class="box-header">
            {{ __('Page Listing') }}
            <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreatePageModal">
              Create Page
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped datatable" data-form="deleteForm">
              <thead>
                <tr>
                 <th>S.No</th>
                 <th>Title</th>
                 <th>Description</th>
                 <th>Created</th>
                 <th><font color="red">Action</font></th>
               </tr>
             </thead>


           </table>
         </div>
         <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
   </div>
   <!-- /.row -->
 </section>
 <!-- /.content -->
</div>


<div id="DeleteModal" class="modal fade text-danger" role="dialog">
 <div class="modal-dialog ">
   <!-- Modal content-->
   <form action="" id="deleteForm" method="post">
     <div class="modal-content">
       <div class="modal-header bg-danger">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
       </div>
       <div class="modal-body">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
         <p class="text-center">Are You Sure Want To Delete ?</p>
       </div>
       <div class="modal-footer">
         <center>
           <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
           <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
         </center>
       </div>
     </div>
   </form>
 </div>
</div>


<!-- Create Article Modal -->
<div class="modal" id="CreatePageModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Article Create</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
          <strong>Success!</strong>Article was added successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" id="title">
        </div>
         <div class="form-group">
          <label for="title">Content:</label>
          <input type="text" class="form-control" name="body" id="body">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" name="description" id="description">                        
          </textarea>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="SubmitCreatePageForm">Create</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Article Modal -->
<div class="modal" id="EditPageModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Article Edit</h4>
        <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
          <strong>Success!</strong>Article was added successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="EditPageModalBody">

        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="SubmitEditPageForm">Update</button>
        <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Article Modal -->
<div class="modal" id="DeletePageModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Article Delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <h4>Are you sure want to delete this Article?</h4>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="SubmitDeletePageForm">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
@endsection


<script type="text/javascript">
  $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          pageLength: 5,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route('get-pages') }}',
            columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
            {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
          });

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

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
          deleteID = $(this).data('id');
        })
        $('#SubmitDeletePageForm').click(function(e) {
          e.preventDefault();
          var id = deleteID;
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "pages/"+id,
            method: 'DELETE',
            success: function(result) {
              setInterval(function(){ 
                $('.datatable').DataTable().ajax.reload();
                $('#DeletePageModal').hide();
              }, 1000);
            }
          });
        });
      });
    </script>

    @endsection

