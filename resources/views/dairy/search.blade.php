@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"> </div>
            <div class="col-sm-8">
                <h3>Results for {{$date}}</h3>
                @if(count($search) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Morning</th>
                            <th>Afternoon</th>
                            <th>Total</th>
                        </tr>
                        @foreach ($search as $dairy_record)
                            <tr>
                                <td></td>
                                <td><a href="/dairy/{{$dairy_record->id}}"> {{$dairy_record->date}}</a></td>
                                <td>{{$dairy_record->morning}}</td>
                                <td>{{$dairy_record->afternoon}}</td>
                                <td>{{$dairy_record->morning + $dairy_record->afternoon }}</td>
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
