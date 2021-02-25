@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Add Health Record</h1>
                {{ Form::open(array('action' => 'App\Http\Controllers\HealthController@store', 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name','',['class' => 'form-control','placeholder'=>'Name of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('treatment','Treatment:')}}
                        {{Form::text('treatment','',['class' => 'form-control','placeholder'=>'Being treated for?'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('medication','Medication:')}}
                        {{Form::text('medication','',['class' => 'form-control','placeholder'=>'Medication given'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('cost','Cost:')}}
                        {{Form::number('cost','',['class' => 'form-control','placeholder'=>'Cost of treatment'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('date','Date:')}}
                        {{Form::date('date','',['class' => 'form-control','placeholder'=>'Date of treatment'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('doctor','Doctor:')}}
                        {{Form::text('doctor','',['class' => 'form-control','placeholder'=>'Name of the doctor'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('remarks','Remarks:')}}
                        {{Form::textarea('remarks','',['class' => 'form-control', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Remarks'])}}
                    </div>
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection