@extends('layouts.app')
@section('content')
    {{-- Create a Beer page.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border border-success">
                    <div class="card-header">
                        <h1 class="card-title">Nieuw Biertje toevoegen</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('beers.store')}}" method="POST" id="beercreateform">
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   placeholder="Biernaam"
                                   value="{{old("name")}}"
                                   class="@error("name") is-invalid @enderror form-control">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="percentage">Alcohol%: </label>
                            <input id="percentage"
                                   name="percentage"
                                   type="number"
                                   min="0.0"
                                   max="100.0"
                                   step="0.1"
                                   value="{{doubleval(old("percentage", 500))/100}}"
                                   class="@error("percentage") is-invalid @enderror form-control">
                            @error("percentage")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <textarea id="description"
                                   name="description"
                                   type="text"
                                      form="beercreateform"
                                      placeholder="optioneel"
                                   class="@error("description") is-invalid @enderror form-control"
                            >{{old("description")}}</textarea>
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="brewer_id">Brouwerij: </label>
                            <select name="brewer_id" id="brewer_id" class="form-select">
                                @foreach($brewers as $brewer)
                                    <option value="{{$brewer->id}}">{{$brewer->name}}</option>
                                @endforeach
                            </select>
                            @error("brewer_id")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            Categorie??n:
                                @foreach($categories as $category)
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckDefault">{{$category->name}}</label>
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="category_id[]" value="{{$category->id}}">
                                </div>
                                @endforeach
                            @error("category_id[]")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="submit" value="Toevoegen" class="btn btn-light btn-outline-success">

                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection


