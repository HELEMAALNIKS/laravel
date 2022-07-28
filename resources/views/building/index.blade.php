@extends('layouts.app-master')
@section('title')
    BUILDING | SGWEBFREELANCER
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Building</h4>
            </div>
            <a href="{{ route('building.create') }}" title="Create">
                <i class="material-icons">create</i>
            </a>
            <div class="card-body">
                <table class="table" id="building_table">
                <thead class=" text-primary">
                    <th>
                        Title
                    </th>
                    <th>
                        Architect
                    </th>
                    <th>
                        Construction Year
                    </th>
                    <th class="text-right">
                    </th>
                </thead>
                <tbody>
                    @foreach ($buildings as $row)
                    <tr>
                        <td>
                            {{ $row->title }}
                        </td>
                        <td>
                            {{ $row->architect }}
                        </td>  
                        <td>
                            {{ $row->constructionyear }}
                        </td>
                        <td class="text-right action_buttons">
                        <a href="{{ route('building.show', $row->id) }}" title="Show Building">
                            <i class="material-icons">preview</i>
                        </a>
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
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>        
                </div>
            <div>
        </div>
    </div>
</div>
@endsection