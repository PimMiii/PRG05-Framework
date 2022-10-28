@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('partials._search')
            <div class="col-md-8">

                @can('create', \App\Models\Beer::class)
                    <div class="alert alert-dark border border-success">
                        <div class="row">
                            <div class="col-9">
                                <h3>{{Auth::user()->name}} kan Bieren toevoegen</h3>
                            </div>
                            <div class="col">
                                <a href="{{route('beers.create')}}" class="btn btn-outline-success">Bier toevoegen</a>
                            </div>
                        </div>
                    </div>
                @endcan

                @foreach($beers as $beer)
                        @can('update', $beer)
                            <div class="card border border-warning">
                                @endcan
                        @cannot('update', $beer)
                                <div class="card border border-info">
                                    @endcan
                        <div class="card-body">
                            <div class="row  card-header">
                                <div class="col-9">
                                    <h1><a href="{{route('beers.show', $beer->id)}}">{{$beer->name}}</a></h1>
                                </div>
                                @can('update', $beer)
                                    <div class="col">
                                        <a class="btn btn-light btn-outline-warning"
                                           href="{{route('beers.edit', $beer->id)}}">Aanpassen</a>
                                    </div>
                                @endcan
                            </div>
                            <div class="row">
                                <div class="col-1"><h2>🍺</h2></div>
                                <div class="col-8">
                                    <h2 class="card-text">{{number_format($beer->percentage/100, 2)}}%</h2>
                                </div>
                                <div class="col-3">
                                    <h2 class="card-title">💕{{number_format($beer->calculateRating(), 1)}}/10</h2>
                                </div>
                            </div>
                            <h5 class="card-text">
                                @foreach($beer->categories as $category)
                                    <a href="{{route('categories.show', $category->id)}}"><span class="badge text-bg-warning">{{$category->name}}</span></a>
                                    @if($beer->categories->count() > 1)
                                        ,
                                    @endif
                                @endforeach
                            </h5>
                            <p class="card-text" style="transform: rotate(0deg)">{{$beer->description}}
                                <a href="{{route('beers.show', $beer->id)}}" class="stretched-link"><span class="badge text-bg-info opacity-75">Meer Weergeven...</span></a></p>
                        </div>
                    </div>
                                <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
