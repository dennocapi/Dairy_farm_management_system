@extends('layouts.app')

@section('content')
        <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Pregnancy record for {{$pregnancy->cow_name}}</h1>
                    <div>
                        <table class="table table-hover table-striped" width="100%">
                            <tr>
                                <th></th>
                                <th>Cow</th>
                                <th>Served on</th>
                                <th>Bull</th>
                                <th>Expected delivery date</th>
                                <th>Cost</th>
                                <th>Doctor</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{$pregnancy->cow_name}}</td>
                                <td>{{$pregnancy->served_on}}</td>
                                <td>{{$pregnancy->bull}}</td>
                                <td>{{$pregnancy->deliver_on}}</td>
                                <td>{{$pregnancy->cost}}</td>
                                <td>{{$pregnancy->doctor }}</td>
                            </tr>
                        </table>
                        <div class="mt-5">
                            <a href="/pregnancy/{{$pregnancy->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                                {!!Form::open(array('action' => ['App\Http\Controllers\PregnancyController@destroy',$pregnancy->id], 'method' => 'POST','class'=>'float-right'))!!}
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