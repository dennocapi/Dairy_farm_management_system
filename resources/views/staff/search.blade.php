@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"> </div>
            <div class="col-sm-8">
                <h3>Results for {{$name}}</h3>
                @if(count($search) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Id Number</th>
                            <th>Position</th>
                        </tr>
                        @foreach ($search as $staff_record)
                            <tr>
                                <td></td>
                                <td><a href="/staff/{{$staff_record->id}}"> {{$staff_record->first_name}} {{$staff_record->second_name}}</a></td>
                                <td>{{$staff_record->phone}}</td>
                                <td>{{$staff_record->email}}</td>
                                <td>{{$staff_record->id_number}}</td>
                                <td>{{$staff_record->title}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No results found</p>
                @endif
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
@endsection