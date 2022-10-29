@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adminportaal</h1>
            <div class="row g-1">
                {{--Beers--}}
                <div class="col-sm">
                    <div class="card border border-warning">
                        <div class="card-header">
                            <h2 class="card-title">Bieren</h2>
                        </div>
                        <ul class="list-group">
                            @foreach($beers as $beer)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-text">{{$beer->name}}</h5>
                                        </div>
                                        <div class="col-3">
                                            <a
                                                @if($beer->is_visible)
                                                    class="btn btn-success"
                                                @else
                                                    class="btn btn-danger"
                                                @endif
                                                href="{{route('beers.update-visibility', $beer->id)}}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('{{$beer->id}}-beer-visibility-form').submit();">
                                                @if($beer->is_visible)
                                                    Zichtbaar
                                                @else
                                                    Onzichtbaar
                                                @endif
                                            </a>
                                            <form id="{{$beer->id}}-beer-visibility-form"
                                                  action="{{route('beers.update-visibility', $beer->id)}}" method="POST"
                                                  class="d-none">
                                                @csrf
                                                @method('PATCH')
                                                <input hidden name="id" value="{{$beer->id}}">
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-warning"
                                               href="{{route('beers.edit', $beer->id)}}">Aanpassen</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--Users--}}
                <div class="col-sm">
                    <div class="card border border-danger">
                        <div class="card-header"><h2 class="card-title">Gebruikers</h2></div>
                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-text">{{$user->name}}
                                                @if($user->is_admin)
                                                    <span class="badge text-bg-danger">Admin</span>
                                                @endif
                                                @if($user->is_verified)
                                                    <span class="badge text-bg-success">Verified</span>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row g-1">
                {{--Categories--}}
                <div class="col-sm">
                    <div class="card border border-info">
                        <div class="card-header"><h2 class="card-title">Categorieën</h2></div>
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-text">{{$category->name}}
                                                @if($category->beers)
                                                    <span
                                                        class="badge text-bg-info">{{$category->beers->count()}}</span>
                                                @endif</h5>
                                        </div>
                                        <div class="col-3">
                                            <a
                                                @if($category->is_visible)
                                                    class="btn btn-success"
                                                @else
                                                    class="btn btn-danger"
                                                @endif
                                                href="{{route('categories.update-visibility', $category->id)}}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('{{$category->id}}-category-visibility-form').submit();">
                                                @if($category->is_visible)
                                                    Zichtbaar
                                                @else
                                                    Onzichtbaar
                                                @endif
                                            </a>
                                            <form id="{{$category->id}}-category-visibility-form"
                                                  action="{{route('categories.update-visibility', $category->id)}}"
                                                  method="POST"
                                                  class="d-none">
                                                @csrf
                                                @method('PATCH')
                                                <input hidden name="id" value="{{$category->id}}">
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-warning"
                                               href="{{route('categories.edit', $category->id)}}">Aanpassen</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{--Brewers--}}
                <div class="col-sm">
                    <div class="card border border-success">
                        <div class="card-header"><h2 class="card-title">Brouwerijen</h2></div>
                        <ul class="list-group">
                            @foreach($brewers as $brewer)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-text">{{$brewer->name}}
                                                @if($brewer->beers)
                                                    <span
                                                        class="badge text-bg-info">{{$brewer->beers->count()}}</span>
                                                @endif</h5>
                                        </div>
                                        <div class="col-3">
                                            <a
                                                @if($brewer->is_visible)
                                                    class="btn btn-success"
                                                @else
                                                    class="btn btn-danger"
                                                @endif
                                                href="{{route('brewers.update-visibility', $brewer->id)}}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('{{$brewer->id}}-brewer-visibility-form').submit();">
                                                @if($brewer->is_visible)
                                                    Zichtbaar
                                                @else
                                                    Onzichtbaar
                                                @endif
                                            </a>
                                            <form id="{{$brewer->id}}-brewer-visibility-form"
                                                  action="{{route('brewers.update-visibility', $category->id)}}"
                                                  method="POST"
                                                  class="d-none">
                                                @csrf
                                                @method('PATCH')
                                                <input hidden name="id" value="{{$brewer->id}}">
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-warning"
                                               href="{{route('brewers.edit', $brewer->id)}}">Aanpassen</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
