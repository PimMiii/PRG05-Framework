@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header"><h1><a href="{{route('categoryDetails', ['id'=>$category->id])}}">{{$category->name}}</a></h1></div>
                        <div class="card-body">
                                @foreach($category->beers as $beer)
                                <p><a href="{{route('beerDetails', ['id'=>$beer->id])}}">{{$beer->name}}</a></p>
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

