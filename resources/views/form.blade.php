@extends('layouts.app')

@section('content')

<style>
.combodate { display:inline; float:left; margin-right:20px;}

</style>



<div class="container">
    <div class="row text-center">
        <div class="col">
            
            <br /><br />
            <h1>Anmeldeformular</h1>
        </div>
    </div>
        <form method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col mt-4">
                <div class="border p-3">
                    <div class="form-group">
                        <label for="file_1">Krankenkasse</label><br />
                        <input type="file" class="form-control-file" id="file_1" name="file_1">
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <div class="border p-3">
                    <div class="form-group">
                        <label for="file_2">Ausweis</label><br />
                        <input type="file" class="form-control-file" id="file_2" name="file_2">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">Vorname</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="" placeholder="">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="">
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Geburtsdatum</label>
            <input type="date" class="form-control" name="birthday" id="birthday" value="" placeholder="">
        </div>

          <div class="mb-3">
            <label for="birthday" class="form-label">Geburtsdatum</label>
            <input type="text" id="date" data-format="DD-MM-YYYY" data-template="D MM YYYY" name="date" value="28-02-2016" class="form-control">

        </div>


        <div class="mb-3">
            <label for="phone" class="form-label">Telefon</label>
            <input type="text" class="form-control" name="phone" id="phone" value="" placeholder="">
        </div>
        <div class="border p-3">
            <div class="mb-2 fw-bold">Transfer Code vom COVID Cert App</div>
            <input type="text" class="form-control" name="transfer_code" id="transfer_code" value="" placeholder="">
        </div>
        <div class="text-center mt-2">
            Falls Sie die COVID Cert App nicht haben, dann downloaden Sie die passende Version
        </div>
        <div class="row mb-5">
            <div class="col text-center">
                <a href="https://apps.apple.com/ch/app/covid-certificate/id1565917320" target="_blank" class="text-decoration-none">
                    <img src="/assets/img/icon-appstore.jpeg" height="50" class="m-3">
                </a>
                <a href="https://play.google.com/store/apps/details?id=ch.admin.bag.covidcertificate.wallet&hl=de_CH&gl=US" class="text-decoration-none" target="_blank">
                    <img src="/assets/img/icon-playstore.jpeg" height="50" class="m-3">
                </a>
            </div>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox"  value="" id="abo" name="abo">
            <label class="form-check-label" for="abo">
                Wollen Sie ein 6 monatiges <strong>GRATIS</strong> Selbsttestabo lösen?
                <small>(inklusive gratis Lieferung)</small>
            </label>
        </div>
        <p>
            <small>Bei allfälligen Änderungen des BAG, wird Ihre Bestellung automatisch an die neuen Richtlinien angepasst.</small>
        </p>
        <button type="submit" name="submit" class="mb-5 btn btn-success btb-block w-100">Absenden</button>
        <input type="hidden" name="_token" value="wDosDU9N11WngfIW8bu66KEgSvHaQOHysyOJd6e3">    </form>
</div>


<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 <script src="{{ asset('public/js/combodate.js') }}"></script>

<script>
$(function(){
    $('#date').combodate({customClass: 'form-control'});  
     });
</script>

@endsection
