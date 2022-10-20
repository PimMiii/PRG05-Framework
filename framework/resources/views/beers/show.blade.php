@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$beer->name}}</h1>
                        <h3>Rating: {{number_format($beer->calculateRating(), 1)}}/10</h3>
                        @can('update', $beer)
                            <a href="{{route('beers.edit', $beer->id)}}"> Aanpassen</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if($beer->brewer)
                            <h2><a href="/brewers/{{$beer->brewer_id}}">{{$beer->brewer->name}}</a></h2>
                        @endif
                        <h3>
                            <bold>Alcohol:</bold>{{number_format($beer->percentage/100, 2)}}%
                        </h3>
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
                                <div class="card-header">
                                    <bold>Laat een review achter</bold>
                                </div>
                                <div class="card-body">
                                    @can('create', \App\Models\Review::class)
                                        <form action="{{route('reviews.store')}}" method="POST">
                                            @csrf
                                            <label for="rating">Rating: </label>
                                            <input id="rating"
                                                   name="rating"
                                                   type="number"
                                                   value="{{number_format(old("rating", 50)/10, 1)}}"
                                                   min="1.0"
                                                   max="10.0"
                                                   step="0.5"
                                                   class="@error("rating") is-invalid @enderror">
                                            @error('rating')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <label for="comment">Comment: </label>
                                            <input id="comment"
                                                   name="comment"
                                                   type="text"
                                                   value="{{old("comment")}}"
                                                   class="@error("comment") is-invalid @enderror">
                                            @error("comment")
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <input type="hidden"
                                                   id="beer_id"
                                                   name="beer_id"
                                                   value="{{$beer->id}}">
                                            <input type="hidden"
                                                   id="user_id"
                                                   name="user_id"
                                                   value="{{auth()->id()}}">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <input type="submit" value="Review plaatsen">
                                        </form>
                                    @endcan
                                    @cannot('create', \App\Models\Review::class)
                                        @if(Auth::user())
                                            Verifieer uw account om een Review achter te laten
                                        @else
                                            Login of Registreer een account om een Review achter te laten
                                        @endif
                                    @endcannot
                                </div>
                            </div>
                            @foreach($beer->reviews as $review)
                                <div class="card">
                                    <div class="card-header">
                                        <bold>{{$review->user->name}}</bold>
                                        <bold>{{number_format($review->rating/10, 1)}} /10</bold>
                                    </div>
                                    <div class="card-body">
                                        @can('update', $review)
                                            <p><a href="{{route('reviews.edit', $review->id)}}">Aanpassen</a></p>
                                        @endcan
                                        <p>{{$review->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
