@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Profiel</h1></div>
                    <div class="card-body">
                       <p>{{$profile->name}}</p>
                        @if($profile->is_verified)
                            <p>Verified</p>
                        @else
                            <p><a href="">Verifieer account</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
