@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>Hello, {{ Auth::user()->name }}! Welcome to Backoffice Portal.</p>
                    <p>Read instructions above for a better navigation to announcements.</p>
                    <h1 class="display-6">Instructions</h1>
                    <hr/>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Announcements menu</strong> on top page: 
                            Redirects you to a list of announcements.
                        </li>
                        <li class="list-group-item">
                            <strong>Create Announcement</strong> menu: 
                            Redirects you to a page to create an announcement.
                        </li>
                        <li class="list-group-item">
                            To <strong>Log out</strong> you should access the top menu named by 
                            your username.
                        </li>
                        <li class="list-group-item">
                            Once in <strong>Announcements</strong> page, you may view, update
                            or delete the announcements created by your user.
                        </li>
                        <li class="list-group-item">
                            You <strong>cannot</strong> update or delete an announcement created
                            by any other user in the application.    
                        </li>
                        <li class="list-group-item">
                            Once in <strong>Create Announcement</strong> page, all the inputs are
                            required to fill in the form.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
