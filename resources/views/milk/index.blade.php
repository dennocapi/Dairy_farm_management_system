@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h1>Milk Records</h1>
                <div class="row mb-2">
                <div class="col-sm-5">
                {{ Form::open(array('action' => ['App\Http\Controllers\MilkController@search'], 'method' => 'POST')) }}
                    @csrf
                    <div class='form-group input-group mb-3'>
                        {{Form::text('search','',['class' => 'form-control','placeholder'=>'Cow name or Date', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                        {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                    </div>
                {{ Form::close() }}
                </div>
            </div>
                @if(count($data['milk_record']) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Cow</th>
                            <th>Morning</th>
                            <th>Afternoon</th>
                            <th>Evening</th>
                            <th>Total</th>
                        </tr>
                    @foreach($data['milk_record'] as $milk)
                        <tr>
                            <td></td>
                            <td><a href="/milk/{{$milk->id}}">{{$milk->day}}</a></td>
                            <td><a href="/milk/{{$milk->cow_id}}/show_all">{{$milk->cow_name}}</a></td>
                            <td>{{$milk->morning}}</td>
                            <td>{{$milk->afternoon}}</td>
                            <td>{{$milk->evening}}</td>
                            <td>{{$milk->morning + $milk->afternoon + $milk->evening }}</td>
                        </tr>
                    @endforeach
                    </table>
                @else
                    <p>No milk record found</p>
                @endif
            </div>
            <div class="col-sm-2 text-center">
                <h3>Latest dairy record</h3><hr>
                @if(!empty($data['dairy']))
                    <div><h4>Date:</h4>{{$data['dairy']->date}}</div>
                    <div><h4>Morning:</h4>{{$data['dairy']->morning}}</div>
                    <div><h4>Afternoon:</h4>{{$data['dairy']->afternoon}}</div>
                    <div><h4>Total:</h4>{{$data['dairy']->morning + $data['dairy']->afternoon}}</div>
                @else
                    <p>No dairy record found</p>
                @endif
            </div>
        </div>
    </div>
    {{$data['milk_record']->links()}}
@endsection
    {{-- <div class="container">
        <div class="row">  
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div> --}}