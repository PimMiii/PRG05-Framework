<div class="alert alert-info">
    <div class="align-items-end">
        <form method="GET" action="#" name="searchform">
            <div class="row">
                <div class="col-7">
                    <input type="text"
                           name="search"
                           placeholder="Zoeken..."
                           class="form-control"
                           value="{{request('search')}}">
                </div>
                <div class="col-4">
                    <div class="btn-group btn-group">
                        @if(request(['searchCategory']))
                            @php
                                $reqSearch = request(['searchCategory'][0]);
                                /*dd($reqSearch)*/
                            @endphp
                            @foreach($categories as $category)

                                      @if(in_array($category->id, $reqSearch))

                                        <input class="btn-check" name="searchCategory[]" type="checkbox"
                                               id="category-{{$category->id}}" value="{{$category->id}}" checked>

                                        <label class="btn btn-outline-success"
                                               for="category-{{$category->id}}">{{$category->name}}</label>
                                    @else
                                        <input class="btn-check" name="searchCategory[]" type="checkbox"
                                               id="category-{{$category->id}}" value="{{$category->id}}">

                                        <label class="btn btn-outline-success"
                                               for="category-{{$category->id}}">{{$category->name}}</label>
                                    @endif
                                @endforeach
                           {{-- @endforeach--}}

                       @else
                            @foreach($categories as $category)
                                <input class="btn-check" name="searchCategory[]" type="checkbox"
                                       id="category-{{$category->id}}" value="{{$category->id}}">

                                <label class="btn btn-outline-success"
                                       for="category-{{$category->id}}">{{$category->name}}</label>

                            @endforeach

                       @endif


                    </div>
                </div>
                <div class="col-1 gx-1">
                    <input type="submit" class="btn btn-success" value="🔍">
                </div>
            </div>
        </form>
    </div>
</div>

