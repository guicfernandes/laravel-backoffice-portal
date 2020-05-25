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

          <div class="row">
            <div class="col">
              <label for="start_date">Start Date:</label>
              <!-- <input type="text" class="form-control" name="start_date"/> -->
              <input placeholder="Select start date" class="date form-control"  
                    type="text" name="start_date">
            </div>
            <div class="col">
              <label for="expiration_date">Expiration Date:</label>
              <input placeholder="Select expiration date" class="date form-control"  
                    type="text" name="expiration_date">
              <!-- <input type="text" class="form-control" name="expiration_date"/> -->
            </div>
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

<script type="text/javascript">
        $('.date').datepicker({  
        format: 'dd-mm-yyyy'
        // format: 'd MM, yyyy'
        });  
</script>
@endsection