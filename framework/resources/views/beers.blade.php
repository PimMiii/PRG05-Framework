@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($beers as $beer)
                    <div class="card">

                        <div class="card-header"><h1>{{$beer->name}}</h1></div>
                        <div class="card-body">
                            <h2>{{number_format($beer->percentage/100, 2)}}%</h2>
                            <h3>
                                @foreach($beer->categories as $category)
                                    {{$category->name}},
                                @endforeach
                            </h3>
                            <p>{{$beer->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
