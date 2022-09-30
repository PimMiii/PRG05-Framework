
@foreach($categories->beers as $beer)
    <h1>{{$beer->name}}</h1>
    <h2>{{$beer->categories}}</h2>
    <h3>{{$beer->percentage/100}}</h3>
    <p>{{$beer->description}}</p>
@endforeach

