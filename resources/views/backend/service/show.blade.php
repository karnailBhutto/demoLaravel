  @extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Service
      <small>Service tables</small>
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

        <div class="box">
          <div class="box-header">

            <h3 class="box-title">Service</h3>
            <a href="{{ url('admin/service') }}" class="pull-right"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <table class="col-lg-12 col-md-12 col-sm-12 table">
            <div class="body">

              @if(!empty($service))
              <tr><td class="col-md-6"><strong> Title</strong></td><td class="col-md-6">{{ $service['title'] }}</td><td></td><td></td></tr>
              <tr><td class="col-md-6"><strong> Content</strong></td><td class="col-md-6">{!! $service['body'] !!}</td><td></td><td></td></tr>

              <tr><td class="col-md-6"><strong> Created At</strong></td><td class="col-md-6">{{ $service['created_at'] }}</td><td></td><td></td></tr>
              @else
              <tr><td><font color="red">No Record Found !</font></td></tr>
              @endif

            </div>
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
@stop

