@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Edit staff member record</h1>
                    {{ Form::open(array('action' => ['App\Http\Controllers\StaffController@update',$staff->id], 'method' => 'POST','enctype' => 'multipart/form-data')) }}
                        {{csrf_field()}}
                        <div class='form-group'>
                            {{Form::Label('first_name','First Name:')}}
                            {{Form::text('first_name',$staff->first_name,['class' => 'form-control','placeholder'=>'Enter first name'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('Second Name','Second Name:')}}
                            {{Form::text('second_name',$staff->second_name,['class' => 'form-control','placeholder'=>'Enter second name'])}}
                        </div>
                            <div class='form-group'>
                            {{Form::Label('phone','Phone Number:')}}
                            {{Form::text('phone',$staff->phone,['class' => 'form-control','placeholder'=>'Enter phone number'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('email','Email:')}}
                            {{Form::text('email',$staff->email,['class' => 'form-control','placeholder'=>'Enter email'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('id','Id Number:')}}
                            {{Form::text('id_no',$staff->id_number,['class' => 'form-control','placeholder'=>'Enter id number'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('title','Title:')}}
                            {{Form::text('title',$staff->title,['class' => 'form-control','placeholder'=>'Rank in the farm'])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
            </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection 