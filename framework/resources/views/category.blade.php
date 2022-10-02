@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$category->name}}</h1></div>
                    <div class="card-body">
                        @foreach($category->beers as $beer)
                            <p><a href="{{route('beerDetails', ['id'=>$beer->id])}}"> {{$beer->name}}, {{number_format($beer->percentage/100, 2)}}%</a></p>
                        @endforeach
                    </div>
                </div>
                <p><a href="{{route('categoriesIndex')}}">Terug naar Categorieën</a></p>
            </div>
        </div>
    </div>
@endsection