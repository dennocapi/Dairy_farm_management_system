@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Add Milk Record</h1>
                {{ Form::open(array('action' => 'App\Http\Controllers\PregnancyController@store', 'method' => 'POST')) }}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name','',['class' => 'form-control','placeholder'=>'Name of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('served_on','Served on:')}}
                        {{Form::date('served_on','',['class' => 'form-control','placeholder'=>'Date when the cow is being served'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('bull','Bull:')}}
                        {{Form::text('bull','',['class' => 'form-control','placeholder'=>'Bull'])}}
                    </div>

                    <div class='form-group'>
                        {{Form::Label('cost','Cost:')}}
                        {{Form::number('cost','',['class' => 'form-control','placeholder'=>'Amount spent'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('doctor','Doctor:')}}
                        {{Form::text('doctor','',['class' => 'form-control','placeholder'=>'Name of the doctor'])}}
                    </div>
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 
