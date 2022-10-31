@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('create', \App\Models\Category::class)
                    <div class="alert alert-dark">
                        <div class="row">
                            <div class="col-9">
                                <h3>{{Auth::user()->name}} kan Categorieën toevoegen</h3>
                            </div>
                            <div class="col">
                                <a href="{{route('categories.create')}}" class="btn btn-success">Categorie toevoegen</a>
                            </div>
                        </div>
                    </div>
                @endcan

                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            @can('update', $category)
                                <div class="card border border-warning">
                                    @endcan
                                    @cannot('update', $category)
                                        <div class="card border border-info">
                                            @endcan
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <h1 class="card-title"><a
                                                                href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                                                        </h1>
                                                    </div>
                                                    @can('update', $category)
                                                        <div class="col">
                                                            <a class="btn btn-outline-warning"
                                                               href="{{route('categories.edit', $category->id)}}">Aanpassen</a>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-text">{{$category->description}}</h5>
                                                <ul class="list-group list-group-flush">
                                                    @foreach($category->beers as $beer)
                                                        @if($beer->is_visible)
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-9">
                                                                        <h5 class="card-text"><a
                                                                                href="{{route('beers.show', $beer->id)}}"
                                                                                class="stretched-link">{{$beer->name}}</a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="col">
                                                                        @if($beer->calculateRating() > 7)
                                                                            <h5 class="card-text">💕<span
                                                                                    class="badge text-bg-success">{{number_format($beer->calculateRating(), 1)}}/10</span>
                                                                            </h5>
                                                                        @elseif($beer->calculateRating() > 4)
                                                                            <h5 class="card-text">💕<span
                                                                                    class="badge text-bg-warning">{{number_format($beer->calculateRating(), 1)}}/10</span>
                                                                            </h5>
                                                                        @elseif($beer->calculateRating() === 0)
                                                                            <h5 class="card-text">💕<span
                                                                                    class="badge text-bg-info">{{number_format($beer->calculateRating(), 1)}}/10</span>
                                                                            </h5>
                                                                        @else
                                                                            <h5 class="card-text">💕<span
                                                                                    class="badge text-bg-danger">{{number_format($beer->calculateRating(), 1)}}/10</span>
                                                                            </h5>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                        </li>
                    @endforeach
                        <li class="list-group-item">
                            <div class="position-absolute start-50 translate-middle-x" style="scale: 1.1;">
                                {{ $categories->onEachSide(3)->links()}}
                                <br>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

