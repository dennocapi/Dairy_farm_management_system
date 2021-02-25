@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Edit Milk Record</h1>
                {{ Form::open(array('action' => ['App\Http\Controllers\MilkController@update',$milk_record->id], 'method' => 'POST','enctype' =>'multipart/form-data')) }}
                {{csrf_field()}}
                    <div class='form-group'>
                        {{Form::Label('cow_name','Name:')}}
                        {{Form::text('cow_name',$milk_record->cow_name,['class' => 'form-control','placeholder'=>'Name of the cow'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('date','Date:')}}
                        {{Form::date('date',$milk_record->day,['class' => 'form-control','placeholder'=>'Date'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('morning','Morning:')}}
                        {{Form::number('morning',$milk_record->morning,['class' => 'form-control','placeholder'=>'Amount of milk in the morning'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('afternoon','Afternoon:')}}
                        {{Form::text('afternoon',$milk_record->afternoon,['class' => 'form-control','placeholder'=>'Amount of milk in the afternoon'])}}
                    </div>

                    <div class='form-group'>
                        {{Form::Label('evening','Evening:')}}
                        {{Form::text('evening',$milk_record->evening,['class' => 'form-control','placeholder'=>'Amount of milk in the evening'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 