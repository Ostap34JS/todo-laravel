@extends('layouts.app') 
@section('title','tasks') 
@section('content')
<div class="row">

  <div class="col">
    
    <h2>Create task</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <form name='create_form' method="post" action="{{route('tasks.store')}}">
        {{csrf_field()}}

          <div class="form-group col-md-12">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" maxlength='150' required>
          </div>

            <div class="form-group col-md-12">
              <label for="description">Description:</label>
              <textarea name="description"></textarea>
              <script>
                CKEDITOR.replace( 'description' ); 
              </script>
            </div>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success btn-block">Add Task</button>            
          </div>
      </form>
  </div>
</div>
@endsection