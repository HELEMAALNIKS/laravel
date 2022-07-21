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
                            <form id="delete_form" action="{{ route('building.destroy',$row->id) }}" method="POST">
                                <a href="{{ route('building.create', $row->id) }}" title="Create Building">
                                    <i class="material-icons">preview</i>
                                </a>
                                <a href="{{ route('building.edit', $row->id) }}" title="Edit">
                                    <i class="material-icons">edit</i>
                                </a>
                            @csrf
                                @method('DELETE')
                            <a href="javascript:void(0);" onclick="document.getElementById('delete_form').submit();">
                                    <i class="material-icons">delete</i>
                                </a>
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