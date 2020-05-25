<!-- @extends('base')  -->
@extends('layouts.app')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6 text-center">View a message</h1>

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
        <div class="form-group">
            <label for="subject">Subject:</label>
            <label name="subject">{{ $message->subject }}</label>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" rows="4" disabled>{{ $message->content }}</textarea>
        </div>

        <div class="row">
            <div class="col">
            <label for="start_date">Start Date:</label>
            <input type="text" class="form-control" name="start_date" value={{ $message->start_date }} disabled/>
            </div>
            <div class="col">
            <label for="expiration_date">Expiration Date:</label>
            <input type="text" class="form-control" name="expiration_date" value={{ $message->expiration_date }} disabled/>
            </div>
        </div>
        <hr/>
        <div class="float-right">  
            @can('update', $message)
                <a href="{{ route('messages.edit',$message->id)}}" class="btn btn-primary">Update</a>
            @endcan
            <a class="btn btn-default btn-close" href="{{ route('messages.index') }}">Cancel</a>
            <!-- <button type="cancel" class="btn btn-primary">Back</button> -->
        </div>
    </div>
</div>
@endsection