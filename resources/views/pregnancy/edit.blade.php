@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Edit pregnancy record</h1>
                {{ Form::open(array('action' => ['App\Http\Controllers\PregnancyController@update',$pregnancy->id], 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name',$pregnancy->cow_name,['class' => 'form-control'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('served_on','Served on:')}}
                        {{Form::date('served_on',$pregnancy->served_on,['class' => 'form-control'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('bull','Bull:')}}
                        {{Form::text('bull',$pregnancy->bull,['class' => 'form-control'])}}
                    </div>

                    <div class='form-group'>
                        {{Form::Label('cost','Cost:')}}
                        {{Form::number('cost',$pregnancy->cost,['class' => 'form-control'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('doctor','Doctor:')}}
                        {{Form::text('doctor',$pregnancy->doctor,['class' => 'form-control'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 