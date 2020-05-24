@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="display-6">Instructions</h1>
                    <hr/>
                    <!-- navigation -->
                    <!-- Options on Announcement Page -->
                    <!-- How to create an Announcement -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
