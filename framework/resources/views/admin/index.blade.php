@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adminportaal</h1>
            <div class="col-sm">
                <div class="card">
                    <div class="card-header"><h2>Bieren</h2></div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($beers as $beer)
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card-title">
                                        <h3>{{$beer->name}}</h3>
                                    </div>
                                            <a
                                                @if($beer->is_visible)
                                                    class="btn btn-success"
                                                @else
                                                    class="btn btn-danger"
                                                @endif
                                                href="{{route('beers.update-visibility', $beer->id)}}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('{{$beer->id}}-visibility-form').submit();">
                                                @if($beer->is_visible)
                                                    Zichtbaar
                                                @else
                                                    Onzichtbaar
                                                @endif
                                            </a>
                                            <form id="{{$beer->id}}-visibility-form" action="{{route('beers.update-visibility', $beer->id)}}" method="POST"
                                                  class="d-none">
                                                @csrf
                                                @method('PATCH')
                                                <input hidden name="id" value="{{$beer->id}}">
                                            </form>
                                            <a class="btn btn-warning" href="{{route('beers.edit', $beer->id)}}">Aanpassen</a>
                                        <p></p>
                                        <p>Brouwerij: {{$beer->brewer->name}}</p>
                                        <p>{{$beer->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card">
                    <div class="card">
                        <div class="card-header"><h2>Categorieën</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title"><h3>{{$category->name}}</h3></div>
                                            <a
                                                @if($category->is_visible)
                                                    class="btn btn-success"
                                                @else
                                                    class="btn btn-danger"
                                                @endif
                                                href="{{route('categories.update-visibility', $category->id)}}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('{{$category->id}}-visibility-form').submit();">
                                                @if($category->is_visible)
                                                    Zichtbaar
                                                @else
                                                    Onzichtbaar
                                                @endif
                                            </a>
                                            <form id="{{$category->id}}-visibility-form" action="{{route('categories.update-visibility', $category->id)}}" method="POST"
                                                  class="d-none">
                                                @csrf
                                                @method('PATCH')
                                                <input hidden name="id" value="{{$category->id}}">
                                            </form>
                                            <a class="btn btn-warning" href="{{route('categories.edit', $category->id)}}">Aanpassen</a>
                                            @if($category->beers)
                                                <p></p>
                                                <p>Bieren: {{$category->beers->count()}}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                    <br>
                    <div class="card">
                        <div class="card-header"><h2>Brouwerijen</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($brewers as $brewer)
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold">{{$brewer->name}}</p>
                                            <ul>
                                                @foreach($brewer->beers as $beer)
                                                    <li>{{$beer->name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header"><h2>Gebruikers</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($users as $user)
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold">{{$user->name}}</p>
                                            @if($user->is_admin)
                                                <p class="fw-bold">Admin</p>
                                            @endif
                                            @if($user->is_verified)
                                                <p>Verified</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
