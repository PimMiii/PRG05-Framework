@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header"><h1>{{$category->name}}</h1></div>
                        <div class="card-body">
                                @foreach($category->beers as $beer)
                                <p>{{$beer->name}}, {{number_format($beer->percentage/100, 2)}}%</p>
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

