        <div class="box-body">
          <label for="email_address">Title</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
             @if ($errors->has('title'))
             <p style="color:red;">
              {!!$errors->first('title')!!}
            </p>
            @endif
          </div>
        </div>


            <label for="email_address">Content</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'editor1']) !!}
             @if ($errors->has('body'))
             <p style="color:red;">
              {!!$errors->first('body')!!}
            </p>
            @endif
          </div>
        </div>

            <label for="email_address">Image</label>
          <div class="form-group">
            <div class="form-line">
              {!! Form::file('image', array('id'=>'image')) !!}
                  @if ($errors->has('image'))
                  <p style="color:red;">
                    {!!$errors->first('image')!!}
                  </p>
                  @endif

          </div>
        </div>



    <!--     <label for="email_address">Image</label>
        <div class="form-group">
          <div class="form-line">
            {!! Form::file('image[]', array('multiple'=>true)) !!}
            @if ($errors->has('image'))
            <p style="color:red;">
              {!!$errors->first('image')!!}
            </p>
            @endif
          </div>
        </div>

 -->
    
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary waves-effect','id'=>'pagesubmit']) !!}
      </div>