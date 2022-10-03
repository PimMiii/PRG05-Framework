@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$beer->name}}</h1></div>
                    <div class="card-body">
                        <p><bold>Alcohol: </bold>{{number_format($beer->percentage/100, 2)}}%</p>
                        <h3>Beschrijving:</h3>
                        <p>{{$beer->description}}</p>
                        <p>
                            @foreach($beer->categories as $category)
                                <a href="{{route('categoryDetails', ['id'=>$category->id])}}">{{$category->name}}</a>,
                            @endforeach
                        </p>
                        <div class="col-md-8">
                            <div class="card">
                                @foreach($beer->reviews as $review)
                                    <div class="card-header">
                                        <bold>{{$review->user->name}}</bold>
                                        <bold>{{number_format($review->rating/10, 1)}} /10</bold>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$review->comment}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <p><a href="{{route('beersIndex')}}">Terug naar Bieren</a> </p>
            </div>
        </div>
    </div>
@endsection
