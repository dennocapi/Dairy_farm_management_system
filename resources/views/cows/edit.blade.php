@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Edit cow details</h1>
                {{ Form::open(array('action' => ['App\Http\Controllers\CowsController@update',$cow->id], 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                    @csrf
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name',$cow->cow_name,['class' => 'form-control','placeholder'=>'Name of the cow'])}}
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
                        {{Form::text('breed',$cow->breed,['class' => 'form-control','placeholder'=>'Breed of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('mother','Mother:')}}
                        {{Form::text('mother',$cow->mother,['class' => 'form-control','placeholder'=>'Mother of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('dob','Date of birth:')}}
                        {{Form::date('dob',$cow->dob,['class' => 'form-control','placeholder'=>'Date of birth'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('milking_status','Milking status:')}}
                        {{Form::select('milking_status',['M'=>'Being Milked','P'=>'Pregnant','C'=>'Calf','B'=>'Bull'],$cow->milking_status)}}
                    </div>
                    {{-- <div class='form-group'>
                        {{Form::file('cover_image')}}
                    </div> --}}
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 