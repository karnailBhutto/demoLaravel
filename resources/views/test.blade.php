@extends('layouts.app')
 
@section('content')

<style>
.form-test { display:inline; float:left; margin-right:20px;}

</style>


<div class="container">

<input type="text" class="combodate" id="date" data-format="DD-MM-YYYY" data-template="D MM YYYY" name="date" value="28-02-2016" class="form-control">

</div>
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 <script src="{{ asset('public/js/combodate.js') }}"></script>

<script>
$(function(){
    $('#date').combodate({customClass: 'form-test'});  
   
     
});
</script>
@endsection
