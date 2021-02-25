@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Health record for {{$health_record->cow_name}} on {{$health_record->day}}</h1>
                    <div>
                        <table class="table table-hover table-striped" width="100%">
                            <tr>
                                <th> </th>
                                <th>Treatment</th>
                                <th>Medication</th>
                                <th>Doctor</th>
                                <th>Remarks</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td>{{$health_record->treatment}}</td>
                                <td>{{$health_record->medication}}</td>
                                <td>{{$health_record->doctor}}</td>
                                <td>{{$health_record->remarks}}</td>
                                <td>{{$health_record->day}}</td>
                            </tr>
                        </table>
                        <div class="mt-5">
                            <a href="/health/{{$health_record->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                                {!!Form::open(array('action' => ['App\Http\Controllers\HealthController@destroy',$health_record->id], 'method' => 'POST','class'=>'float-right'))!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection