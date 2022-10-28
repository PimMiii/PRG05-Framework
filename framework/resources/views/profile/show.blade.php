@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('partials._pagetracker')
            <div class="col-md-8">
                <div class="card border border-info">
                    <div class="card-header"><h1 class="card-title">Profiel</h1></div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                        <div class="row">
                            <div class="col-9">
                        <p class="card-text">Naam: {{$profile->name}}</p>
                            </div>
                            @if($profile->is_verified)
                                <div class="col-2">
                                <h5 class="card-text"><span class="badge text-bg-success">Verified</span></h5>
                                </div>
                            @endif
                        </div>
                            </li>
                            <li class="list-group-item">
                        <p class="card-text">E-mail: {{$profile->email}}</p>
                            </li>
                            <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                        <p class="card-text">Aangemaakt op: {{$profile->created_at}}</p>
                            </div>
                            <div class="col-6">
                        <p class="card-text">Laatste update: {{$profile->updated_at}}</p>
                            </div>
                        </div>
                            </li>
                        </ul>
                        <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-warning">Gegevens Updaten</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
