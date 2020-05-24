@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <div>
        <a style="margin: 19px;" href="{{ route('messages.create')}}" class="btn btn-primary">Create Annoncement</a>
    </div>  
    <h1 class="display-3">Create Announcements</h1>   
    
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
    @endif 
    
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Start Date</td>
          <td>Expiration Date</td>
          <td>Subject</td>
          <td colspan = 3>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
            @if($message->active)
            <tr>
                <td>{{$message->start_date}}</td>
                <td>{{$message->expiration_date}}</td>
                <td>{{$message->subject}}</td>
                <td>
                    <a href="{{ route('messages.show',$message->id)}}" class="btn btn-primary">View</a>
                </td>
                <td>
                    <a href="{{ route('messages.edit',$message->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('messages.destroy', $message->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
    </table>
<div>
</div>
@endsection