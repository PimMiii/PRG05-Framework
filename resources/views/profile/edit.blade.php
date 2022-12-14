@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border border-warning">
                    <div class="card-header"><h1 class="card-title">Profiel Bewerken</h1></div>
                    <div class="card-body">
                        <form action="{{route('profile.update', $profile->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $profile->name)}}"
                                   class="@error("name") is-invalid @enderror form-control">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="email">E-mail: </label>
                            <input id="email"
                                   name="email"
                                   type="email"
                                   value="{{old("email", $profile->email)}}"
                                   class="@error("description") is-invalid @enderror form-control">
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <input type="submit" value="Opslaan" class="btn btn-light btn-outline-warning">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
