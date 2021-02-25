@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Edit {{$health_record->cow_name}}'s Health Record</h1>
                {{ Form::open(array('action' => ['App\Http\Controllers\HealthController@update',$health_record->id], 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                {{csrf_field()}}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name',$health_record->cow_name,['class' => 'form-control','placeholder'=>'Name of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('treatment','Treatment:')}}
                        {{Form::text('treatment',$health_record->treatment,['class' => 'form-control','placeholder'=>'Being treated for?'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('medication','Medication:')}}
                        {{Form::text('medication',$health_record->medication,['class' => 'form-control','placeholder'=>'Medication given'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('date','Date:')}}
                        {{Form::date('date',$health_record->day,['class' => 'form-control','placeholder'=>'Date of treatment'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('doctor','Doctor:')}}
                        {{Form::text('doctor',$health_record->doctor,['class' => 'form-control','placeholder'=>'Name of the doctor'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('remarks','Remarks:')}}
                        {{Form::textarea('remarks',$health_record->remarks,['class' => 'form-control', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Remarks'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 