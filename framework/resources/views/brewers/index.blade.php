@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($brewers as $brewer)
                    <div class="card">
                        <div class="card-header"><h1><a href="/brewers/{{$brewer->id}}">{{$brewer->name}}</a></h1></div>
                        <div class="card-body">
                            @foreach($brewer->beers as $beer)
                                <p><a href="/beers/{{$beer->id}}">{{$beer->name}}</a></p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
