@extends('layouts.app')

@section('content')
        <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Milk record for {{$milk_record->cow_name}} on {{$milk_record->day}} </h1>
                    <div>
                        <table class="table table-hover table-striped" width="100%">
                            <tr>
                                <th> </th>
                                <th>Date</th>
                                <th>Cow</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Evening</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{$milk_record->day}}</td>
                                <td>{{$milk_record->cow_name}}</td>
                                <td>{{$milk_record->morning}}</td>
                                <td>{{$milk_record->afternoon}}</td>
                                <td>{{$milk_record->evening}}</td>
                                <td>{{$milk_record->morning + $milk_record->afternoon + $milk_record->evening }}</td>
                            </tr>
                        </table>
                        <div class="mt-5">
                            <a href="/milk/{{$milk_record->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                                {!!Form::open(array('action' => ['App\Http\Controllers\MilkController@destroy',$milk_record->id], 'method' => 'POST','class'=>'float-right'))!!}
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