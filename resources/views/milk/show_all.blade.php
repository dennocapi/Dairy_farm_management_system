@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go Back</a>
                <h1>Milk records for {{$milk_record[0]->cow_name}}</h1>
                <table class="table table-hover table-striped" width="100%">
                    <tr>
                        <th> </th>
                        <th>Date</th>
                        <th>Cow</th>
                        <th>Morning</th>
                        <th>Afternoon</th>
                        <th>Evening</th>
                        <th>Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                @foreach ($milk_record as $milk)
                            <tr>
                                <td></td>
                                <td>{{$milk->day}}</td>
                                <td>{{$milk->cow_name}}</td>
                                <td>{{$milk->morning}}</td>
                                <td>{{$milk->afternoon}}</td>
                                <td>{{$milk->evening}}</td>
                                <td>{{$milk->morning + $milk->afternoon + $milk->evening }}</td>
                                <td><a href="/milk/{{$milk->id}}/edit" class="btn btn-warning mr-5">Edit</a></td>
                                <td>
                                    {!!Form::open(array('action' => ['App\Http\Controllers\MilkController@destroy',$milk->id], 'method' => 'POST','class'=>'float-right'))!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                @endforeach
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection