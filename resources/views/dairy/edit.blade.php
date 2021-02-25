@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Add Dairy Record</h1>
                {{ Form::open(array('action' => ['App\Http\Controllers\DairyController@update',$dairy->id], 'method' => 'POST')) }}
                    <div class='form-group'>
                        {{Form::Label('date','Date:')}}
                        {{Form::date('date',$dairy->date,['class' => 'form-control'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('morning','Morning:')}}
                        {{Form::text('morning',$dairy->morning,['class' => 'form-control','placeholder'=>'Morning entry at the dairy'])}}
                    </div>
                    <div class='form-group'>
                        {{Form::Label('afternoon','Afternoon:')}}
                        {{Form::text('afternoon',$dairy->afternoon,['class' => 'form-control','placeholder'=>'Afternoon entry at the dairy'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {{ Form::close() }}
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection 