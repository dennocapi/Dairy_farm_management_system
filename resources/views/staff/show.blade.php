@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"> </div>
            <div class="col-sm-8">
                <h1>{{$staff->first_name}} {{$staff->second_name}}</h1>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Id Number</th>
                        <th>Title</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{$staff->first_name}} {{$staff->second_name}}</td>
                        <td>{{$staff->phone}}</td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->id_number}}</td>
                        <td>{{$staff->title}}</td>
                    </tr>
                </table>
                <div class="mt-5">
                    <a href="/staff/{{$staff->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                    {!!Form::open(array('action' => ['App\Http\Controllers\StaffController@destroy',$staff->id], 'method' => 'POST','class'=>'float-right'))!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
@endsection
