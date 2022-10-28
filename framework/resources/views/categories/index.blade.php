@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('create', \App\Models\Category::class)
                    <div class="alert alert-dark">
                        <div class="row">
                            <div class="col-9">
                                <h3>{{Auth::user()->name}} kan Categorieën toevoegen</h3>
                            </div>
                            <div class="col">
                                <a href="{{route('categories.create')}}" class="btn btn-success">Categorie toevoegen</a>
                            </div>
                        </div>
                    </div>
                @endcan
                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header"><h1><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></h1>
                            @can('update', $category)
                                <a href="{{route('categories.edit', $category->id)}}">Aanpassen</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <p>{{$category->description}}</p>
                                @foreach($category->beers as $beer)
                                    @if($beer->is_visible)
                                <p><a href="{{route('beers.show', $beer->id)}}">{{$beer->name}}</a></p>
                                @endif
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

