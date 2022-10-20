@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('create', \App\Models\Beer::class)
                    <p><a href="/beers/create">Bier toevoegen</a></p>
                @endcan
                @foreach($beers as $beer)
                    <div class="card">
                        <div class="card-header"><h1><a href="/beers/{{$beer->id}}">{{$beer->name}}</a></h1>
                            <h3>Rating: {{number_format($beer->calculateRating(), 1)}}/10</h3>
                        @can('update', $beer)
                            <a href="{{route('beers.edit', $beer->id)}}">Aanpassen</a>
                        @endcan
                        </div>
                        <div class="card-body">
                            <h2>{{number_format($beer->percentage/100, 2)}}%</h2>
                            <h3>
                                @foreach($beer->categories as $category)
                                    <a href="/categories/{{$category->id}}">{{$category->name}}</a>
                                    @if($beer->categories->count() > 1)
                                        ,
                                    @endif
                                @endforeach
                            </h3>
                            <p>{{$beer->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
