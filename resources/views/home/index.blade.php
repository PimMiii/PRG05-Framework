@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('partials._search')
            <div class="row g-1">
                {{--Beers--}}
                <div class="col-md-7">
                    <ul class="list-group list-group-flush">
                        @foreach($beers as $beer)
                            <li class="list-group-item">
                                @can('update', $beer)
                                    <div class="card border border-warning">
                                        @endcan
                                        @cannot('update', $beer)
                                            <div class="card border border-info">
                                                @endcan
                                                <div class="card-body">
                                                    <div class="row  card-header">
                                                        <div class="col">
                                                            <h1>
                                                                <a href="{{route('beers.show', $beer->id)}}">{{$beer->name}}</a>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <h2 class="card-text">🍺{{number_format($beer->percentage/100, 2)}}
                                                                %</h2>
                                                        </div>
                                                        <div class="col">
                                                            <h2 class="card-title">
                                                                💕{{number_format($beer->calculateRating(), 1)}}/10</h2>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-text">
                                                        @foreach($beer->categories as $category)
                                                            @if($category->is_visible)
                                                                <a href="{{route('categories.show', $category->id)}}"><span
                                                                        class="badge text-bg-warning">{{$category->name}}</span></a>
                                                            @endif
                                                        @endforeach
                                                    </h5>
                                                    <p class="card-text"
                                                       style="transform: rotate(0deg)">{{$beer->description}}
                                                        <a href="{{route('beers.show', $beer->id)}}" class="stretched-link"><span
                                                                class="badge text-bg-info opacity-75">Meer Weergeven...</span></a>
                                                    </p>
                                                </div>
                                            </div>
                            </li>
                        @endforeach
                            <li class="list-group-item">
                                <div class="position-absolute start-50 translate-middle-x" style="scale: 1.1;">
                                    {{ $beers->onEachSide(3)->links()}}
                                    <br>
                                </div>
                            </li>
                    </ul>

                </div>
                <div class="col-sm-5">
                    <ul class="list-group list-group-flush">
                    {{--Categories--}}
                        <li class="list-group-item">
                    <div class="card border border-info">
                        <div class="card-header"><h2 class="card-title">Categorieën</h2></div>
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-text">{{$category->name}}
                                                @if($category->beers)
                                                    <a href="{{route('categories.show', $category->id)}}" class="stretched-link"><span
                                                            class="badge rounded-pill text-bg-info">{{$category->beers->count()}}</span></a>
                                                @endif</h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                        </li>
                        <li class="list-group-item">
                            {{--Brewers--}}
                    <div class="card border border-success">
                        <div class="card-header"><h2 class="card-title">Brouwerijen</h2></div>
                        <ul class="list-group">
                            @foreach($brewers as $brewer)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-text">{{$brewer->name}}
                                                @if($brewer->beers)
                                                    <a href="{{route('brewers.show', $brewer->id)}}" class="stretched-link"><span
                                                            class="badge rounded-pill text-bg-info">{{$brewer->beers->count()}}</span></a>
                                                @endif</h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card border border-danger">
                                <div class="card-header"><h1 class="card-title">Over dit Project</h1></div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5 class="card-text">Pim van Milt</h5>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-text">PRG05-Web application frameworks <span class="badge rounded-pill text-bg-warning">2022-2023</span></h5>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col">
                                                    <h5 class="card-text">CMGT-HR</h5>
                                                </div>
                                        </li>
                                        <li class="list-group-item">
                                            <h6 class="card-text">Beschrijvingen van Bieren, Brouwerijen en/of Categorieën afkomstig van:</h6>
                                            <a href="https://www.bierista.nl/">Bierista.nl</a>
                                        </li>
                                    </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
