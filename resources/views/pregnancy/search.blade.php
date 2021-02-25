@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3>Results for {{$name}}</h3>
                @if(count($search) > 0)
                    <table class = "table table-hover table-striped" width = "100%">
                        <tr>
                            <th>#</th>
                            <th>Cow</th>
                            <th>Served on</th>
                            <th>Bull</th>
                            <th>Expected delivery date</th>
                            <th>Cost</th>
                            <th>Doctor</th>
                        </tr>
                    @foreach($search as $pregnancy_record )
                        <div>
                                <tr>
                                    <td></td>
                                    {{-- <td><a href="/health/{{$health_record->id}}">{{$health_record->day}}</a></td> --}}
                                    <td><a href="/pregnancy/{{$pregnancy_record->id}}">{{$pregnancy_record->cow_name}}</a></td>
                                    <td>{{$pregnancy_record->served_on}}</td>
                                    <td>{{$pregnancy_record->bull}}</td>
                                    <td>{{$pregnancy_record->deliver_on}}</td>
                                    <td>{{$pregnancy_record->cost}}</td>
                                    <td>{{$pregnancy_record->doctor}}</td>
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