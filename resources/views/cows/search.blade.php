@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Results for {{$name}}</h3>
        <section class="row">
            @if(count($search) > 0)
                @foreach($search as $search)
                    <div class="col-sm-3">
                        <div class="card border-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$search->cow_name}}</h5>
                                <hr>
                                <a href="/cows/{{$search->id}}" class="card-text">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No results found</p>
            @endif
        </section>
    </div>
@endsection

