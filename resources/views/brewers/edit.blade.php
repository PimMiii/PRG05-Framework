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
                        <h1>Brouwerij aanpassen</h1>
                    </div>
                    <div class="card-body">
                        {{--Form--}}
                        <form action="{{route('brewers.update', $brewer->id)}}" method="POST" id="brewerupdateform">
                            @method('PUT')
                            @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$brewer->id}}}">
                            <label for="name">Naam: </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{old("name", $brewer->name)}}"
                                   class="@error("name") is-invalid @enderror form-control">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="description">Beschrijving: </label>
                            <textarea id="description"
                                   name="description"
                                   type="text"
                                      form="brewerupdateform"
                                   placeholder="optioneel"
                                   class="@error("description") is-invalid @enderror form-control"
                            >{{old("description", $brewer->description)}}</textarea>
                            @error("description")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            {{--Only show dropdown to admin--}}
                            @if(Auth::user()->is_admin === 1)
                            <label for="user_id">Kies een nieuwe Brouwerij Eigenaar:</label>
                            <select name="user_id" id="user_id" class="form-select">
                                @foreach($users as $user)
                                    @if($user->id === $brewer->user_id)
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
                            <input type="submit" value="Opslaan" class="btn btn-light btn-outline-warning">
                        </form>
                    </div>
                </div>
                    </li>
                @can('delete', $brewer)
                        <li class="list-group-item">
                <div class="card border border-danger">
                    <div class="card-header">
                        <h1>Brouwerij verwijderen</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">Wil je deze <span class="badge text-bg-danger">{{$brewer->name}}</span> verwijderen? <br>
                        Deze brouwerij heeft {{$brewer->beers->count()}} bieren, deze zullen de brouwerij verliezen.<br>
                        <br>
                        <h5>Weet je zeker dat je de brouwerij wilt verwijderen?</h5>
                        <form action="{{route('brewers.destroy', $brewer->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                            <input id="id"
                                   name="id"
                                   type="hidden"
                                   value="{{$brewer->id}}">
                            <input type="submit" value="JA, ik weet het zeker!" class="btn btn-light btn-outline-danger" >
                        </form>
                    </div>
                </div>
                </li>
                @endcan
                </ul>
            </div>
        </div>
@endsection
