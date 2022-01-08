@extends('layout/main')
@section('title', 'Sign in')

@section('content')
    <div class="row m-2 d-flex justify-content-center">
        @foreach($books as $book)
            <div class="col col-sm-3 mb-2">
                <div class="card  .mr-auto">
                    <img class="card-img-top" src="{{Storage::url($book->image)}}" alt="{{Storage::url($book->image)}}" height="150px"/>
                    <h5 class="card-title m-2">{{$book->name}}</h5>
                    <p class="card-text m-2">{{$book->description}}</p>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
