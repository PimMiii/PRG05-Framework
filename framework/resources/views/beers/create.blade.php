@extends('layouts.app')
@section('content')
    {{-- Create a Beer page.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Nieuw Biertje toevoegen</h1>
                    </div>
                    <div class="card-body">

                        <form action="/beers" method="POST">
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name")}}"
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
                                   value="{{doubleval(old("percentage", 500))/100}}"
                                   class="@error("percentage") is-invalid @enderror">

                            @error("percentage")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <input id="description"
                                   name="description"
                                   type="text"
                                   value="{{old("description")}}"
                                   class="@error("description") is-invalid @enderror">
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="submit" value="Toevoegen">

                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection


