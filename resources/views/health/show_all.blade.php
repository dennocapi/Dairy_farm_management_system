@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Health records for {{$health_record[0]->cow_name}}</h1>
                    <div>
                        <table class="table table-hover table-striped" width="100%">
                            <tr>
                                <th> </th>
                                <th>Treatment</th>
                                <th>Medication</th>
                                <th>Cost</th>
                                <th>Doctor</th>
                                <th>Remarks</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($health_record as $health)
                                <tr>
                                <td> </td>
                                <td>{{$health->treatment}}</td>
                                <td>{{$health->medication}}</td>
                                <td>{{$health->cost}}</td>
                                <td>{{$health->doctor}}</td>
                                <td>{{$health->remarks}}</td>
                                <td>{{$health->day}}</td>
                                <td><a href="/health/{{$health->id}}/edit" class="btn btn-warning mr-5">Edit</a></td>
                                <td>
                                    {!!Form::open(array('action' => ['App\Http\Controllers\HealthController@destroy',$health->id], 'method' => 'POST','class'=>'float-right'))!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection