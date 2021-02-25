@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Add Cow</h1>
                {{ Form::open(array('action' => 'App\Http\Controllers\CowsController@store', 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name','',['class' => 'form-control','placeholder'=>'Name of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('sex','Sex:')}} <br>
                        {{Form::radio('sex','Female',true)}}
                        {{Form::Label('female','Female')}} <br>
                        {{Form::radio('sex','Male')}}
                        {{Form::Label('male','Male')}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('breed','Breed:')}}
                        {{Form::text('breed','',['class' => 'form-control','placeholder'=>'Breed of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('mother','Mother:')}}
                        {{Form::text('mother','',['class' => 'form-control','placeholder'=>'Mother of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('dob','Date of birth:')}}
                        {{Form::date('dob','',['class' => 'form-control','placeholder'=>'Date of birth'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('milking_status','Milking status:')}}
                        {{Form::select('milking_status',['M'=>'Being Milked','P'=>'Pregnant','C'=>'Calf','B'=>'Bull'],'M')}}
                    </div>
                    <div class='form-group'>
                        {{Form::file('profile_image')}}
                    </div>
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 