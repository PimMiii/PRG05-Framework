@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Review aanpassen</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('reviews.update', $review->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <label for="rating">Rating: </label>
                            <input id="rating"
                                   name="rating"
                                   type="number"
                                   value="{{number_format(old("rating", $review->rating)/10, 1)}}"
                                   min="1.0"
                                   max="10.0"
                                   step="0.5"
                                   class="@error("rating") is-invalid @enderror">
                            @error('rating')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <label for="comment">Comment: </label>
                            <input id="comment"
                                   name="comment"
                                   type="text"
                                   value="{{old("comment", $review->comment)}}"
                                   class="@error("comment") is-invalid @enderror">
                            @error("comment")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="submit" value="Review updaten">
                        </form>
                    </div>
                </div>
                @can('delete', $review)
                    <div class="card">
                        <div class="card-header">
                            <h1>Review verwijderen</h1>
                        </div>
                        <div class="card-body">
                            Wil je de review voor {{$review->beer->name}}, verwijderen? <br>
                            Deze review is geplaatst op: {{$review->created_at}}. <br>
                            En voor het laatst aangepast op: {{$review->updated_at}}.<br>

                            <h5>Weet je zeker dat je deze review wilt verwijderen?</h5>
                            <form action="{{route('reviews.destroy', $review->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input id="id"
                                       name="id"
                                       type="hidden"
                                       value="{{$review->id}}">
                                <input type="submit" value="JA, ik weet het zeker!" class="bg-warning" >
                            </form>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
@endsection
