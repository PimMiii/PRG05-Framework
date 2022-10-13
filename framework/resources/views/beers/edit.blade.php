@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Bier aanpassen</h1>
                    </div>
                    <div class="card-body">
                        <form action="/beers/{{$beer->id}}" method="POST">
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
                                   class="@error("name") is-invalid @enderror">
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
                                   value="{{doubleval(old("percentage", $beer->percentage))/100}}"
                                   class="@error("percentage") is-invalid @enderror">

                            @error("percentage")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <input id="description"
                                   name="description"
                                   type="text"
                                   value="{{old("description", $beer->description)}}"
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
                            <input type="submit" value="Opslaan">
                        </form>
                    </div>
                </div>
                @can('delete', $beer)
                <div class="card">
                    <div class="card-header">
                        <h1>Bier verwijderen</h1>
                    </div>
                    <div class="card-body">
                        Wil je dit bier, {{$beer->name}}, verwijderen? <br>

                        <h5>Weet je zeker dat je dit biertje wilt verwijderen?</h5>
                        <form action="{{route('beers.destroy', $beer->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$beer->id}}">
                            <input type="submit" value="JA, ik weet het zeker!" class="bg-warning" >
                        </form>
                    </div>
                </div>
                @endcan
            </div>
        </div>
@endsection
