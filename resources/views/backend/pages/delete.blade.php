<script type="text/javascript">
  $(document).ready(function() {

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
                location.reload();
              }, 1000);
            }
          });
        });
    
      });
    </script>