@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h1>Health records</h1>
                <div class="row mb-2">
                    <div class="col-sm-5">
                        {{ Form::open(array('action' => ['App\Http\Controllers\HealthController@search'], 'method' => 'POST')) }}
                            @csrf
                            <div class='form-group input-group mb-3'>
                                {{Form::text('search','',['class' => 'form-control','placeholder'=>'Cow,Date or Doctor', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                                {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(count($health_records) > 0)
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
                    @foreach($health_records as $health_record )
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
                    {{$health_records->links()}}
                @else
                    <p>No posts found</p>
                @endif
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection