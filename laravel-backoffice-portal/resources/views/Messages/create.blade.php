@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Create Announcements</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('messages.store') }}">
          @csrf
          <div class="form-group">    
              <label for="subject">Subject:</label>
              <input type="text" class="form-control" name="subject"/>
          </div>

          <div class="form-group">
              <label for="content">Content:</label>
              <input type="text" class="form-control" name="content"/>
          </div>

          <div class="form-group">
              <label for="start_date">Start Date:</label>
              <input type="text" class="form-control" name="start_date"/>
          </div>
          <div class="form-group">
              <label for="expiration_date">Expiration Date:</label>
              <input type="text" class="form-control" name="expiration_date"/>
          </div>               
          <button type="submit" class="btn btn-primary-outline">Create</button>
          <button type="cancel" class="btn btn-primary-outline">Cancel</button>
      </form>
  </div>
</div>
</div>
@endsection