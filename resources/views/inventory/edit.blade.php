@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Inventory</h1>
                <h2>Edit item</h2>
                    {{ Form::open(array('action' => ['App\Http\Controllers\InventoryController@update',$item->id], 'method' => 'POST')) }}
                    {{csrf_field()}}
                        <div class='form-group'>
                            {{Form::Label('item_name','Name:')}}
                            {{Form::text('item_name',$item->item_name,['class' => 'form-control','placeholder'=>'Name of the item'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('type','Type:')}}
                            {{Form::select('type',['feed'=>'Feed','tool'=>'Tool','other'=>'Other'],$item->type)}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('quantity','Quantity:')}}
                            {{Form::text('quantity',$item->quantity,['class' => 'form-control','placeholder'=>'Quantity of the item(s)'])}}
                        </div>
                        <div class='form-group'>
                            {{Form::Label('date','Date:')}}
                            {{Form::date('date',$item->date,['class' => 'form-control','placeholder'=>'Date'])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
            </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection 