@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Categorie aanpassen</h1>
                    </div>
                    <div class="card-body">

                        <form action="/categories/{{$category->id}}" method="POST">
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
                                   class="@error("name") is-invalid @enderror">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <input id="description"
                                   name="description"
                                   type="text"
                                   value="{{old("description", $category->description)}}"
                                   class="@error("description") is-invalid @enderror">
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
                            <input type="submit" value="Opslaan" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                @can('delete', $category)
                <div class="card">
                    <div class="card-header">
                        <h1>Categorie verwijderen</h1>
                    </div>
                    <div class="card-body">
                        Wil je deze categorie, {{$category->name}}, verwijderen? <br>
                        Deze categorie heeft {{$category->beers->count()}} bieren, deze zullen de categorie verliezen.<br>
                        <br>
                        <h5>Weet je zeker dat je de categorie wilt verwijderen?</h5>
                        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$category->id}}">
                            <input type="submit" value="JA, ik weet het zeker!" class="btn btn-danger">
                        </form>
                    </div>
                </div>
                @endcan
            </div>
        </div>
@endsection
