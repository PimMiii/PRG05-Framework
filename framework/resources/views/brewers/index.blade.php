@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('create', \App\Models\Brewer::class)
                    <div class="alert alert-dark">
                        <div class="row">
                            <div class="col-9">
                                <h3>{{Auth::user()->name}} kan Brouwerijen toevoegen</h3>
                            </div>
                            <div class="col">
                                <a href="{{route('brewers.create')}}" class="btn btn-success">Brouwerij toevoegen</a>
                            </div>
                        </div>
                    </div>
                    <p></p>
                @endcan

                @foreach($brewers as $brewer)
                    <div class="card">
                        <div class="card-header"><h1><a href="{{route('brewers.show', $brewer->id)}}">{{$brewer->name}}</a></h1>
                        @can('update', $brewer)
                            <a href="{{route('brewers.edit', $brewer->id)}}">Aanpassen</a>
                        @endcan
                        </div>
                        <div class="card-body">
                            <p>{{$brewer->description}}</p>
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
