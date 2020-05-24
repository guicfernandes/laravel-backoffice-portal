@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a message</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('messages.update', $message->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" value={{ $message->subject }} />
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <input type="text" class="form-control" name="content" value={{ $message->content }} />
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="text" class="form-control" name="start_date" value={{ $message->start_date }} />
            </div>
            <div class="form-group">
                <label for="expiration_date">Expiration Date:</label>
                <input type="text" class="form-control" name="expiration_date" value={{ $message->expiration_date }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
@endsection