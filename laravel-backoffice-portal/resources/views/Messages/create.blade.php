<!-- @extends('base') -->
@extends('layouts.app')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-6 text-center">Create Announcements</h1>
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
              <textarea class="form-control" name="content" rows="4"></textarea>
          </div>

          <div class="form-group">
              <label for="start_date">Start Date:</label>
              <!-- <input type="text" class="form-control" name="start_date"/> -->
              <div id="start-date-picker" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                <input placeholder="Select start date" type="text" class="form-control" name="start_date">
                <i class="fas fa-calendar input-prefix"></i>
              </div>
          </div>
          <div class="form-group">
              <label for="expiration_date">Expiration Date:</label>
              <input type="text" class="form-control" name="expiration_date"/>
          </div>
          <hr/>
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-default btn-close" href="{{ route('messages.index') }}">Cancel</a>
            <!-- <button type="cancel" class="btn btn-primary">Cancel</button> -->
          </div>
      </form>
  </div>
</div>
</div>
@endsection