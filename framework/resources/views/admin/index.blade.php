@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adminportaal</h1>
            <div class="col-sm">
                <div class="card">
                    <div class="card-header"><h2>Bieren</h2></div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach($beers as $beer)
                                <div class="card">
                                    <div class="card-body">
                                        <p class="fw-bold">{{$beer->name}}</p>
                                        <p>Brouwerij: {{$beer->brewer->name}}</p>
                                        <p>{{$beer->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card">
                    <div class="card">
                        <div class="card-header"><h2>Categorieën</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold">{{$category->name}}</p>
                                            @if($category->beers)
                                                <p>Bieren: {{$category->beers->count()}}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header"><h2>Brouwerijen</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($brewers as $brewer)
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold">{{$brewer->name}}</p>
                                            <ul>
                                                @foreach($brewer->beers as $beer)
                                                    <li>{{$beer->name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header"><h2>Gebruikers</h2></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($users as $user)
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold">{{$user->name}}</p>
                                            @if($user->is_admin)
                                                <p class="fw-bold">Admin</p>
                                            @endif
                                            @if($user->is_verified)
                                                <p>Verified</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
