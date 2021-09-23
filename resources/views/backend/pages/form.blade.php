
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





  <label for="email_address">Short Description</label>

  <div class="form-group">

    <div class="form-line">

     {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) !!}

     @if ($errors->has('description'))

     <p style="color:red;">

      {!!$errors->first('description')!!}

    </p>

    @endif

  </div>

</div>



      <label for="password">Page Content</label>

      <div class="form-group">

       <section id="editor">

        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'editor1']) !!}

        @if ($errors->has('body'))

        <p style="color:red;">

          {!!$errors->first('body')!!}

        </p>

        @endif



      </section>

    </div>





        <label for="email_address">Meta Description</label>

  <div class="form-group">

    <div class="form-line">

     {!! Form::text('meta_description', null, ['class' => 'form-control', 'id' => 'meta_description']) !!}

     @if ($errors->has('meta_description'))

     <p style="color:red;">

      {!!$errors->first('meta_description')!!}

    </p>

    @endif

  </div>

</div>


  <label for="email_address">Meta Keyword</label>

  <div class="form-group">

    <div class="form-line">

     {!! Form::text('meta_keyword', null, ['class' => 'form-control', 'id' => 'meta_keyword']) !!}

     @if ($errors->has('meta_keyword'))

     <p style="color:red;">

      {!!$errors->first('meta_keyword')!!}

    </p>

    @endif

  </div>

</div>




    <label for="password">Status</label>

    <div class="form-group">

      <div class="form-line">

        {!! Form::select('status',['Open','Closed'], null,  ['class' => 'form-control']) !!}

        @if ($errors->has('status'))

        <p style="color:red;">

          {!!$errors->first('status')!!}

        </p>

        @endif

      </div>

    </div>


    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary waves-effect','id'=>'pagesubmit']) !!}

  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




