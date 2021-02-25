@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"> </div>
            <div class="col-sm-8">
                <h1>Dairy Milk Records</h1>
                <div class="row mb-2">
                    <div class="col-sm-4">
                        {{ Form::open(array('action' => ['App\Http\Controllers\DairyController@search'], 'method' => 'POST')) }}
                            @csrf
                            <div class='form-group input-group mb-3'>
                                {{Form::text('date','',['class' => 'form-control','placeholder'=>'Date', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                                {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(count($dairy) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Morning</th>
                            <th>Afternoon</th>
                            <th>Total</th>
                        </tr>
                        @foreach ($dairy as $dairy_record)
                            <tr>
                                <td></td>
                                <td><a href="/dairy/{{$dairy_record->id}}"> {{$dairy_record->date}}</a></td>
                                <td>{{$dairy_record->morning}}</td>
                                <td>{{$dairy_record->afternoon}}</td>
                                <td>{{$dairy_record->morning + $dairy_record->afternoon }}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No dairy record available</p>
                @endif
                {{$dairy->links()}}
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
@endsection
