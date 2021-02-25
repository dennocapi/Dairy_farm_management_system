@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
               <h1>{{$item->item_name}}</h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->date}}</td>
                    </tr>
                    </table>
                <div class="mt-5">
                    <a href="/inventory/{{$item->id}}/edit" class="btn btn-warning mr-5">Edit</a>
                    {!!Form::open(array('action' => ['App\Http\Controllers\InventoryController@destroy',$item->id], 'method' => 'POST','class'=>'float-right'))!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection 