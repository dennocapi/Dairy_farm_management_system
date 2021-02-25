@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h1>Pregnancy records</h1>
                <div class="row mb-2">
                    <div class="col-sm-5">
                        {{ Form::open(array('action' => ['App\Http\Controllers\PregnancyController@search'], 'method' => 'POST')) }}
                            @csrf
                            <div class='form-group input-group mb-3'>
                                {{Form::text('search','',['class' => 'form-control','placeholder'=>'Cow name or date', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                                {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(count($pregnancy) > 0)
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
                    @foreach($pregnancy as $pregnancy_record )
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
                    {{$pregnancy->links()}}
                @else
                    <p>No pregnancy records found</p>
                @endif
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection