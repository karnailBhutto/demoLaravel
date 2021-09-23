        <div class="box-body">
          <label for="email_address">Name</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
             @if ($errors->has('name'))
             <p style="color:red;">
              {!!$errors->first('name')!!}
            </p>
            @endif
          </div>
        </div>
        <label for="password">Email Address</label>
        <div class="form-group">
          <div class="form-line">
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
            @if ($errors->has('email'))
            <p style="color:red;">
              {!!$errors->first('email')!!}
            </p>
            @endif
          </div>
        </div>

        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary waves-effect','id'=>'pagesubmit']) !!}
      </div>