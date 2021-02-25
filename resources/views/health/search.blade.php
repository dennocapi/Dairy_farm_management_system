@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3>Results for {{$input}}</h3>
                @if(count($search) > 0)
                <table class = "table table-hover table-striped" width = "100%">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Cow</th>
                        <th>Treatment</th>
                        <th>Medication</th>
                        <th>Cost</th>
                        <th>Doctor</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach($search as $health_record )
                        <div>
                                <tr>
                                    <td></td>
                                    <td><a href="/health/{{$health_record->id}}">{{$health_record->day}}</a></td>
                                    <td><a href="/health/{{$health_record->cow_id}}/show_all">{{$health_record->cow_name}}</a></td>
                                    <td>{{$health_record->treatment}}</td>
                                    <td>{{$health_record->medication}}</td>
                                    <td>{{$health_record->cost}}</td>
                                    <td>{{$health_record->doctor}}</td>
                                    <td>{{$health_record->remarks}}</td>
                                </tr>
                        </div>
                    @endforeach
                </table>
                @else
                    <p>No results found</p>
                @endif
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection
