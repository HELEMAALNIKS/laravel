@extends('layouts.app-master')

@section('title')
    Search | Programmeren 5
@endsection
@section('content')
<div class="bg-light p-5 rounded">
    <h1>Search results for "{{ request()->query('search') }}"</h1>
    @if($buildings->isNotEmpty())
        @foreach ($buildings as $building)
            <div class="shadow-sm rounded building-listitem bg-white py-2 px-2 my-2">
                <p>{{ $building->title }} {{ $building->architect}} ({{ $building->constructionyear }})</p>
                <a class="btn btn-dark float-right" href="/building/{{ $building->id }}">Show</a>            
            </div>
        @endforeach
    @else 
    <div>
        <h2>No building found</h2>
    </div>
    @endif
</div>
@endsection