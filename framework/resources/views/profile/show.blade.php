@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Profiel</h1></div>
                    <div class="card-body">
                       <p>Naam: {{$profile->name}}</p>
                        @if($profile->is_verified)
                            <p>Verified</p>
                        @else
                            <p><a href="">Verifieer account</a></p>
                        @endif
                        <p>E-mail: {{$profile->email}}</p>
                        <p>Account aangemaakt op: {{$profile->created_at}}</p>
                        <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-warning">Gegevens Updaten</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
