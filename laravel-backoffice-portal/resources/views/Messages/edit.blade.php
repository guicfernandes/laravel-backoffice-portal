<!-- @extends('base')  -->
@extends('layouts.app')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6 text-center">Update a message</h1>

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
                <textarea class="form-control" name="subject" rows="1">{{ $message->subject }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="content" rows="4">{{ $message->content }}</textarea>
            </div>

            <div class="row">
                <div class="col">
                <label for="start_date">Start Date:</label>
                <input type="text" class="date form-control" name="start_date" value={{ date('d-m-Y', strtotime($message->start_date)) }} />
                </div>
                <div class="col">
                <label for="expiration_date">Expiration Date:</label>
                <input type="text" class="date form-control" name="expiration_date" value={{ date('d-m-Y', strtotime($message->expiration_date)) }} />
                </div>
            </div>
            <hr/>
            <div class="float-right">  
                @can('update', $message)
                    <button type="submit" class="btn btn-warning">Update</button>
                @endcan
                <a class="btn btn-default btn-close" href="{{ route('messages.index') }}">Cancel</a>
                <!-- <button type="cancel" class="btn btn-primary">Cancel</button> -->
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
        $('.date').datepicker({  
        format: 'dd-mm-yyyy'
        // format: 'd MM, yyyy'
        });  
</script>
@endsection