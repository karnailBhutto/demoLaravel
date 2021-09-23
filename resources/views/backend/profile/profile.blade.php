@extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
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
    @include('backend.flash-message')
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/backend/images/profile/') }}/{{ Auth::user()->image }}" alt="User profile picture">

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">{{ Auth::user()->email }}</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="pull-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          
        </div>
        
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Profile Settings</a></li>
            <li><a href="#settings" data-toggle="tab">Change Password</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                {!! Form::model($profile, ['method' => 'PATCH', 'class'=>'form-horizontal','action' => ['App\Http\Controllers\backend\ProfileController@update',$profile->id],'files'=>true]) !!}
                <div class="form-group">
                  <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <div class="form-line">

                     {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'title']) !!}
                     @if ($errors->has('name'))
                     <p style="color:red;">
                      {!!$errors->first('name')!!}
                    </p>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <div class="form-line">
                    {!! Form::text('email', null, ['class' => 'form-control', 'readonly' => 'true']) !!}

                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="InputExperience" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-10">
                  <div class="  ">
                    {!! Form::file('image', array('multiple'=>true)) !!}
                    @if ($errors->has('image'))
                    <p style="color:red;">
                      {!!$errors->first('image')!!}
                    </p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                  <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">SUBMIT</button>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.post -->

            <!-- Post -->
            
            <!-- /.post -->

            <!-- Post -->

            <!-- /.post -->
          </div>

          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
           {!! Form::open(['url'=>'admin/change-password', 'class'=>'form-horizontal','method' => 'post']) !!}

           <div class="form-group">
            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
            <div class="col-sm-9">
              <div class="form-line">
                <input type="password" class="form-control" id="NewPassword" name="password"  placeholder="New Password" required>

                @if ($errors->has('password'))
                <p style="color:red;">
                  {!!$errors->first('password')!!}
                </p>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
            <div class="col-sm-9">
              <div class="form-line">
                <input type="password" class="form-control" id="NewPasswordConfirm" name="c_password" placeholder="New Password (Confirm)" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-danger">SUBMIT</button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>
@stop

