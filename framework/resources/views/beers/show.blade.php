@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$beer->name}}</h1>
                    @can('update', $beer)
                        <a href="{{route('beers.edit', $beer->id)}}"> Aanpassen</a>
                    @endcan
                    </div>
                    <div class="card-body">
                        @if($beer->brewer)
                            <h2><a href="/brewers/{{$beer->brewer_id}}">{{$beer->brewer->name}}</a></h2>
                        @endif
                        <h3><bold>Alcohol: </bold>{{number_format($beer->percentage/100, 2)}}%</h3>
                        <h3>Beschrijving:</h3>
                        <p>{{$beer->description}}</p>
                        <p>
                            @foreach($beer->categories as $category)
                                <a href="/categories/{{$category->id}}">{{$category->name}}</a>
                                @if($beer->categories->count() > 1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                        {{--Reviews--}}
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
                <p><a href="/beers">Terug naar Bieren</a></p>
            </div>
        </div>
    </div>
@endsection
