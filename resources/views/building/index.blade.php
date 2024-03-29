@extends('layouts.app-master')
@section('title')
    BUILDING | SGWEBFREELANCER
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Buildings</h4>
                <a href="{{ route('building.create') }}" class="btn btn-primary">Add new building</a>
            </a>
            </div>
           
            <div class="card-body">
                <div class="container">
                <div class="row">
                @foreach ($buildings as $row)
                <div class="col-sm">
                        <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/' . $row->image_path) }}" alt="{{ $row->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->title }} ({{ $row->constructionyear}})</h5>
                            <p class="card-text">Architect: {{ $row->architect}}</p>
                            <p class="card-text">{{ $row->description}}</p>
                            <p class="card-text">{{ $row->user_id}}</p>
                            <a href="{{ route('building.show', $row->id) }}" class="btn btn-primary">Show</a>
                            @if(auth()->user()->id === $row->user_id || auth()->user()->user_type == 'Administrator')
                                <a href="{{ route('building.edit', $row->id) }}" class="btn btn-primary">Edit</a>
                            @endif
                            @if(count(auth()->user()->buildings) > 4 && auth()->user()->id === $row->user_id || auth()->user()->user_type == 'Administrator')
                                <form action="{{ url('building' , $row->id ) }}" method="POST" class="d-inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">Delete</button>
                            @endif
                            </form>
                        </div>
                        </div>
                    {{-- <tr>
                        <a href="{{ route('building.edit', $row->id) }}" title="Edit">
                            <i class="material-icons">edit</i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <form action="{{ url('building' , $row->id ) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button>Delete</button>
                        </form>
                    </td>
                    </tr> --}}
                    </div>
                    @endforeach
                </div>
                </div>
                    
                </div>        
                </div>
            <div>
        </div>
    </div>
</div>
@endsection