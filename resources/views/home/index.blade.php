@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard t</h1>
        <p class="lead">Only authenticated asdfasdfusers can access this section.</p>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. asdfasdfasdfPlease login to view the restricted data.</p>
        @endguest
    </div>
@endsection