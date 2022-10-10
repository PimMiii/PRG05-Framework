@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @can('create', \App\Models\Category::class)
                    <p><a href="/categories/create">Categorie toevoegen</a></p>
                @endcan

                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header"><h1><a href="/categories/{{$category->id}}">{{$category->name}}</a></h1>
                            @can('update', $category)
                                <a href="/categories/{{$category->id}}/edit">Aanpassen</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <p>{{$category->description}}</p>
                                @foreach($category->beers as $beer)
                                <p><a href="/beers/{{$beer->id}}">{{$beer->name}}</a></p>
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

