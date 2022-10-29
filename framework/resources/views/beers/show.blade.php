@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('partials._pagetracker')
            <div class="col-md-8">
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
                                        <div class="col-9">
                                            <h2 class="card-text">🍺{{number_format($beer->percentage/100, 2)}}%</h2>
                                        </div>
                                        <div class="col-3">
                                            <h2 class="card-title">💕{{number_format($beer->calculateRating(), 1)}}
                                                /10</h2>
                                        </div>
                                    </div>

                                            <h5 class="card-text">Brouwer: <a href="{{route('brewers.show', $beer->brewer->id)}}">{{$beer->brewer->name}}</a></h5>

                                    <h5 class="card-text">Categorieën:
                                        @foreach($beer->categories as $category)
                                            <a href="{{route('categories.show', $category->id)}}"><span
                                                    class="badge text-bg-warning">{{$category->name}}</span></a>
                                            @if($beer->categories->count() > 1)
                                                ,
                                            @endif
                                        @endforeach
                                    </h5>


                                    <p class="card-text">{{$beer->description}}</p>
                                </div>
                                {{--Reviews--}}
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{--Logged in User's review--}}
                                        @if($userReview !== null)
                                            <div class="card border border-warning">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="card-title">{{$userReview->user->name}}</h5>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                💕{{number_format($userReview->rating/10, 1)}} /10 </h5>
                                                        </div>
                                                        @can('update', $userReview)
                                                            <div class="col-3">
                                                                <a href="{{route('reviews.edit', $userReview->id)}}"
                                                                   class="btn btn-outline-warning">Aanpassen</a>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                    @if($userReview->comment !== null)
                                                        <div class="card-body">
                                                            <p>{{$userReview->comment}}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            {{--Logged in User doesn't have a review--}}
                                            <div class="card border border-success">
                                                <div class="card-header">
                                                    <h5 class="card-title">Laat een review achter</h5>
                                                </div>
                                                <div class="card-body">
                                                    @can('create', \App\Models\Review::class)
                                                        <form action="{{route('reviews.store')}}" method="POST"
                                                              id="reviewform">
                                                            @csrf
                                                            <label for="rating">Rating: </label>
                                                            <input id="rating"
                                                                   name="rating"
                                                                   type="number"
                                                                   value="{{number_format(old("rating", 50)/10, 1)}}"
                                                                   min="1.0"
                                                                   max="10.0"
                                                                   step="0.5"
                                                                   class="@error("rating") is-invalid @enderror form-control">
                                                            @error('rating')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <br>
                                                            <label for="comment">Comment: </label>
                                                            <textarea id="comment"
                                                                      name="comment"
                                                                      type="text"
                                                                      form="reviewform"
                                                                      placeholder="optional"
                                                                      class="@error("comment") is-invalid @enderror form-control"
                                                            >{{old("comment")}}</textarea>
                                                            @error("comment")
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <br>
                                                            <input type="hidden"
                                                                   id="beer_id"
                                                                   name="beer_id"
                                                                   value="{{$beer->id}}">
                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            <input type="submit" value="Review plaatsen"
                                                                   class="btn btn-light btn-outline-success">
                                                        </form>
                                                    @endcan

                                                    @cannot('create', \App\Models\Review::class)
                                                        {{--Client can not make a review--}}
                                                        <div class="card border border-danger">
                                                            <div class="card-body">

                                                                @if(Auth::user())
                                                                    {{--is not verified--}}
                                                                    <p class="card-text"> Verifieer uw account om een
                                                                        Review achter te laten</p>
                                                                @else
                                                                    {{--is not logged in--}}
                                                                    <p class="card-text">
                                                                        <a href="{{route('login')}}">Login</a> of <a
                                                                            href="{{route('register')}}">Registreer</a>
                                                                        om een review achter te laten</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endcannot
                                                </div>
                                        @endif
                                    </li>
                                    @if($userReview !== null)
                                        @php($reviews = $beer->reviews->where('id','!=', $userReview->id))
                                    @else
                                        @php($reviews = $beer->reviews)
                                    @endif
                                    @foreach($reviews as $review)
                                        <li class="list-group-item">
                                            <div class="card border border-info">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="card-title">{{$review->user->name}}</h5>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                💕{{number_format($review->rating/10, 1)}} /10 </h5>
                                                        </div>
                                                        @can('update', $review)
                                                            <div class="col-3">
                                                                <a href="{{route('reviews.edit', $review->id)}}"
                                                                   class="btn btn-outline-warning">Aanpassen</a>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                    @if($review->comment !== null)
                                                        <div class="card-body">

                                                            <p>{{$review->comment}}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
