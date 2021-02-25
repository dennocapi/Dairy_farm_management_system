@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Cows</h1>
            <div class="row mb-2">
                <div class="col-sm-4">
                {{ Form::open(array('action' => ['App\Http\Controllers\CowsController@search'], 'method' => 'POST')) }}
                    @csrf
                    <div class='form-group input-group mb-3'>
                        {{Form::text('search','',['class' => 'form-control','placeholder'=>'Cow name', 'aria-label'=>'Search', 'aria-describedby'=>'basic-addon2'])}}
                        {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                    </div>
                {{ Form::close() }}
                </div>
            </div>
        <section class="row">
            @if(count($cows) > 0)
                @foreach($cows as $cow)
                    <div class="col-sm-3">
                        <div class="card border-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$cow->cow_name}}</h5>
                                <hr>
                                <a href="/cows/{{$cow->id}}" class="card-text">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No cows found</p>
            @endif
                {{$cows->links()}}
        </section>
    </div>
@endsection
{{-- <li><h3><a style="color:black;" href="/cows/{{$cow->id}}">{{$cow->cow_name}}</a></h3></li> --}}
