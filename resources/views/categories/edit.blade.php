@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group-flush">
                    {{--Update--}}
                    <li class="list-group-item">
                        <div class="card border border-warning">
                            <div class="card-header">
                                <h1 class="card-title">Categorie aanpassen</h1>
                            </div>
                            <div class="card-body">

                                <form action="/categories/{{$category->id}}" method="POST" id="catupdateform">
                                    @method('PUT')
                                    @csrf
                                    <input id="id"
                                           name="id"
                                           type="hidden"
                                           value="{{$category->id}}}">
                                    <label for="name">Naam: </label>
                                    <input id="name"
                                           name="name"
                                           type="text"
                                           value="{{old("name", $category->name)}}"
                                           placeholder="Categorie"
                                           class="@error("name") is-invalid @enderror form-control">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="description">Beschrijving: </label>
                                    <textarea id="description"
                                           name="description"
                                           type="text"
                                              form="catupdateform"
                                           placeholder="optioneel"
                                           class="@error("description") is-invalid @enderror form-control"
                                    >{{old("description", $category->description)}}</textarea>
                                    @error("description")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="submit" value="Opslaan" class="btn btn-light btn-outline-warning">
                                </form>
                            </div>
                        </div>
                    </li>
                    @can('delete', $category)
                        <li class="list-group-item">
                            <div class="card border border-danger">
                                <div class="card-header">
                                    <h1>Categorie verwijderen</h1>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text">Wil je <span class="badge text-bg-danger">{{$category->name}}</span> verwijderen? <br>
                                    Deze categorie heeft {{$category->beers->count()}} bieren, deze zullen de categorie
                                    verliezen.<br>
                                    <br>
                                    Weet je zeker dat je de categorie wilt verwijderen?</h5>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input id="id"
                                               name="id"
                                               type="hidden"
                                               value="{{$category->id}}">
                                        <input type="submit" value="JA, ik weet het zeker!"
                                               class="btn btn-light btn-outline-danger">
                                    </form>
                                </div>
                            </div>
                        </li>
                @endcan
            </div>
        </div>
@endsection
