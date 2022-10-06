@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$brewer->name}}</h1></div>
                    <div class="card-body">
                        @foreach($brewer->beers as $beer)
                            <p><a href="/beers/{{$beer->id}}">{{$beer->name}}</a></p>
                        @endforeach
                    </div>
                </div>
                <p><a href="/brewers">Terug naar Brouwerijen</a></p>
            </div>
        </div>
    </div>
@endsection
