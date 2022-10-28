@extends('layouts.app')
@section('content')
    {{-- Create a Brewer page.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border border-success">
                    <div class="card-header">
                        <h1 class="card-title">Nieuwe Brouwerij toevoegen</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('brewers.store')}}" method="POST" id="brewercreateform">
                            @csrf
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
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
                                      form="brewercreateform"
                                   placeholder="optioneel"
                                   class="@error("description") is-invalid @enderror form-control"
                            >{{old('description')}}</textarea>
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            {{--Only show dropdown to admin--}}
                            @if(Auth::user()->is_admin === 1)
                                <label for="user_id">Kies een Brouwerij Eigenaar:</label>
                                <select name="user_id" id="user_id" class="form-select">
                                    @foreach($users as $user)
                                        @if($user->id === Auth::id())
                                            <option selected value="{{$user->id}}">{{$user->name}}</option>
                                        @else
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
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
