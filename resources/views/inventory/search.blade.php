@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3>Results for {{$item}}</h3>
                @if(count($search) > 0)
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    @foreach($search as $item )
                        <div>
                                <tr>
                                    <td> </td>
                                    <td><a href="/inventory/{{$item->id}}">{{$item->item_name}}</a></td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->date}}</td>
                                </tr>
                        </div>
                    @endforeach
                @else
                    <p>No results found</p>
                @endif
                </table>
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
@endsection
