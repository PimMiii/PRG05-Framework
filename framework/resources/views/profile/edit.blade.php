@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Profiel Bewerken</h1></div>
                    <div class="card-body">
                        <form action="{{route('profile.update', $profile->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $profile->name)}}"
                                   class="@error("name") is-invalid @enderror">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="email">E-mail: </label>
                            <input id="email"
                                   name="email"
                                   type="email"
                                   value="{{old("email", $profile->email)}}"
                                   class="@error("description") is-invalid @enderror">
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            {{--<label for="password">Wachtwoord ter verificatie: </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   class="@error("password") is-invalid @enderror">
                            @error("password")
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
                            @endif--}}
                            <input type="submit" value="Opslaan" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
