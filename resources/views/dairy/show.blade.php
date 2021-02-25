@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Dairy record on {{$dairy->date}}</h1>
                    <div>
                        <table class="table table-hover table-striped" width="100%">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td>{{$dairy->date}}</td>
                                <td>{{$dairy->morning}}</td>
                                <td>{{$dairy->afternoon}}</td>
                                <td>{{$dairy->morning + $dairy->afternoon}}</td>
                            </tr>
                        </table>
                        <div class="mt-5">
                            <a href="/dairy/{{$dairy->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                                {!!Form::open(array('action' => ['App\Http\Controllers\DairyController@destroy',$dairy->id], 'method' => 'POST','class'=>'float-right'))!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection