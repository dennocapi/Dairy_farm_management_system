@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
             </div>

            <div class="col-sm-8">
                <h1>Inventory</h1>
                <div class="row mb-2">
                    <div class="col-sm-4">
                        {{ Form::open(array('action' => ['App\Http\Controllers\InventoryController@search'], 'method' => 'POST')) }}
                            @csrf
                            <div class='form-group input-group mb-3'>
                                {{Form::text('item','',['class' => 'form-control','placeholder'=>'Item name', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                                {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(count($data['feeds']) > 0)
                <h3>Feeds</h3>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    @foreach($data['feeds'] as $item )
                        <div>
                                <tr>
                                    <td> </td>
                                    <td><a href="/inventory/{{$item->id}}">{{$item->item_name}}</a></td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->date}}</td>
                                </tr>
                        </div>
                    @endforeach
                    {{-- {{$data['feeds']->links()}} --}}
                @else
                    <p>No feeds found</p>
                @endif
                </table>
                @if(count($data['tools']) > 0)
                <h3>Tools</h3>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    @foreach($data['tools'] as $item )
                        <div>
                                <tr>
                                    <td> </td>
                                    <td><a href="/inventory/{{$item->id}}">{{$item->item_name}}</a></td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->date}}</td>
                                </tr>
                        </div>
                    @endforeach
                    {{-- {{$data['tools']->links()}} --}}
                @else
                    <p>No tools found</p>
                @endif
                </table>
                @if(count($data['others']) > 0)
                <h3>Others</h3>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    @foreach($data['others'] as $item )
                        <div>
                                <tr>
                                    <td> </td>
                                    <td><a href="/inventory/{{$item->id}}">{{$item->item_name}}</a></td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->date}}</td>
                                </tr>
                        </div>
                    @endforeach
                    {{-- {{$data['others']->links()}} --}}
                @else
                    <p>No other items found</p>
                @endif
                </table>
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
    {{-- {{$milk_record->links()}} --}}
@endsection