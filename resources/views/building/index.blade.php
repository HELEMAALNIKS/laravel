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
             
             

            <div>
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
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



             
</div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection