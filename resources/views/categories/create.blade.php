@extends('layouts.app')
@section('content')
    {{-- Create a Beer page.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border border-success">
                    <div class="card-header">
                        <h1 class="card-title">Nieuwe Categorie toevoegen</h1>
                    </div>
                    <div class="card-body">
                        <form action="/categories" method="POST" id="catcreateform">
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   placeholder="Categorie"
                                   value="{{old("name")}}"
                                   class="@error("name") is-invalid @enderror form-control">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <textarea id="description"
                                   name="description"
                                   type="text"
                                      form="catcreateform"
                                   placeholder="optioneel"
                                   class="@error("description") is-invalid @enderror form-control"
                            >{{old("description")}}</textarea>
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
                            <input type="submit" value="Toevoegen" class="btn btn-light btn-outline-success">

                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection
