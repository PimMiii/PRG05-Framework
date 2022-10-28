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
                                <h1 class="card-title">Bier aanpassen</h1>
                            </div>
                            <div class="card-body">
                                <form action="{{route('beers.update', $beer->id)}}" method="POST" id="beereditform">
                                    @method('PUT')
                                    @csrf
                                    <input id="id"
                                           name="id"
                                           type="hidden"
                                           value="{{$beer->id}}}">
                                    <label for="name">Naam: </label>
                                    <input id="name"
                                           name="name"
                                           type="text"
                                           value="{{old("name", $beer->name)}}"
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
                                           value="{{doubleval(old("percentage", $beer->percentage /100))}}"
                                           class="@error("percentage") is-invalid @enderror form-control">
                                    @error("percentage")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="description">Beschrijving: </label>
                                    <textarea id="description"
                                              name="description"
                                              type="text"
                                              form="beereditform"
                                              class="@error("description") is-invalid @enderror form-control"
                                    >{{old("description", $beer->description)}}</textarea>
                                    @error("description")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <label for="brewer_id">Brouwerij: </label>
                                    <select name="brewer_id" id="brewer_id" class="form-select">
                                        @foreach($brewers as $brewer)
                                            @if($beer->brewer_id === $brewer->id)
                                                <option value="{{$brewer->id}}" selected>{{$brewer->name}}</option>
                                            @else
                                                <option value="{{$brewer->id}}">{{$brewer->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error("brewer_id")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    Categorieën:
                                    @foreach($categories as $category)
                                        @if($beer->categories->contains($category->id))
                                            <div class="form-check">
                                                <label class="form-check-label"
                                                       for="flexCheckChecked">{{$category->name}}</label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                       name="category_id[]" value="{{$category->id}}" checked>
                                            </div>
                                        @else
                                            <div class="form-check">
                                                <label class="form-check-label"
                                                       for="flexCheckDefault">{{$category->name}}</label>
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                                       name="category_id[]" value="{{$category->id}}">
                                            </div>
                                        @endif
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
                                    <input type="submit" value="Opslaan" class="btn btn-light btn-outline-warning">
                                </form>
                            </div>
                        </div>
                    </li>
                    {{--Delete--}}
                    @can('delete', $beer)
                        <li class="list-group-item">
                            <div class="card border border-danger">
                                <div class="card-header">
                                    <h1 class="card-title">Bier verwijderen</h1>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-text">Wil je <span
                                            class="badge text-bg-danger">{{$beer->name}}</span> verwijderen?</h5>

                                    <h6 class="card-text">Weet je zeker dat je dit biertje wilt verwijderen?</h6>
                                    <form action="{{route('beers.destroy', $beer->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input id="id"
                                               name="id"
                                               type="hidden"
                                               value="{{$beer->id}}">
                                        <input type="submit" value="JA, ik weet het zeker!"
                                               class="btn btn-light btn-outline-danger">
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
@endsection
