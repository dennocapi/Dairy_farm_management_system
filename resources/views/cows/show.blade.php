@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Go back</a>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <img class="responsive img-fluid image " style="width:100%" height="50%" src={{URL::asset("storage/cows/profile_images/$cow->profile_image")}}>
        </div>
        <div class="col-md-6 col-sm-6">
            <h1><u>{{$cow->cow_name}}</u></h1>
            <p><b>Gender:</b> {{$cow->sex}}</p>
            <p><b>Breed:</b> {{$cow->breed}}</p>
            <p><b>Date of birth:</b> {{$cow->dob}}</p>
            <p><b>Mother:</b> {{$cow->mother}}</p>
            <div><b><a href="/milk/{{$cow->id}}/show_all">Milk Production</a></b></div>
            <div><b><a href="/health/{{$cow->id}}/show_all">Health status</a></b></div>
            <div class="mt-5">
                <a href="/cows/{{$cow->id}}/edit" class="btn btn-secondary">Edit</a>
                {!!Form::open(array('action' => ['App\Http\Controllers\CowsController@destroy',$cow->id], 'method' => 'POST','class'=>'float-right'))!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
    </div>

@endsection