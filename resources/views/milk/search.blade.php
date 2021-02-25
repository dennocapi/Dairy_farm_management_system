@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3>Results for {{$name}}</h3>
                @if(count($search) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Cow</th>
                            <th>Morning</th>
                            <th>Afternoon</th>
                            <th>Evening</th>
                            <th>Total</th>
                        </tr>
                    @foreach($search as $milk)
                        <tr>
                            <td></td>
                            <td><a href="/milk/{{$milk->id}}">{{$milk->day}}</a></td>
                            <td><a href="/milk/{{$milk->cow_id}}/show_all">{{$milk->cow_name}}</a></td>
                            <td>{{$milk->morning}}</td>
                            <td>{{$milk->afternoon}}</td>
                            <td>{{$milk->evening}}</td>
                            <td>{{$milk->morning + $milk->afternoon + $milk->evening }}</td>
                        </tr>
                    @endforeach
                    </table>
                @else
                    <p>No results found</p>
                @endif
            </div>
            <div class="col-sm-2 text-center"></div>
        </div>
    </div>
@endsection
