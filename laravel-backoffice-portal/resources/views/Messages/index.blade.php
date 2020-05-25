<!-- @extends('base') -->
@extends('layouts.app')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-6 text-center">Annoncements</h1>   
    
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 
    
    <table class="table table-striped"  style="text-align:center">
    <thead>
        <tr>
          <td style="width:30%">Start Date</td>
          <td style="width:30%">Expiration Date</td>
          <td style="width:30%">Subject</td>
          <td colspan = 3 style="width:30%">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
            @if($message->active)
            <tr>
                <td>{{$message->start_date}}</td>
                <td>{{$message->expiration_date}}</td>
                <td>{{$message->subject}}</td>
                
                @can('update', $message)
                    <td>
                        <a href="{{ route('messages.show',$message->id)}}" class="btn btn-primary">View</a>
                    </td>
                    <td>
                        <a href="{{ route('messages.edit',$message->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('messages.destroy', $message->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Cancel</button>
                        </form>
                    </td>
                @else
                    <td colspan=3>
                        <a href="{{ route('messages.show',$message->id)}}" class="btn btn-primary">View</a>
                    </td>
                @endcan
            </tr>
            @endif
        @endforeach
    </tbody>
    </table>
<div>
</div>
@endsection