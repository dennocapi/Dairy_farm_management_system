@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"> </div>
            <div class="col-sm-8">
                <h1>Staff members</h1>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{ Form::open(array('action' => ['App\Http\Controllers\StaffController@search'], 'method' => 'POST')) }}
                            @csrf
                            <div class='form-group input-group mb-3'>
                                {{Form::text('search','',['class' => 'form-control','placeholder'=>'Name,phone,id,email or position', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                                {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(count($staff) > 0)
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Id Number</th>
                            <th>Position</th>
                        </tr>
                        @foreach ($staff as $staff_record)
                            <tr>
                                <td></td>
                                <td><a href="/staff/{{$staff_record->id}}"> {{$staff_record->first_name}} {{$staff_record->second_name}}</a></td>
                                <td>{{$staff_record->phone}}</td>
                                <td>{{$staff_record->email}}</td>
                                <td>{{$staff_record->id_number}}</td>
                                <td>{{$staff_record->title}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>No staff record available</p>
                @endif
                {{$staff->links()}}
            </div>
            <div class="col-sm-2"> </div>
        </div>
    </div>
@endsection