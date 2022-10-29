<div class="alert alert-info">
    <div class="align-items-end">
        <form method="GET" action="" name="searchform">
            <div class="row">
                <div class="col">
                    <input type="text"
                           name="search"
                           placeholder="Zoeken..."
                           class="form-control"
                           value="{{request('search')}}"
                    >
                </div>
                <div class="col">
                    <select name="category[]" class="form-select" multiple="multiple">
                        <option value="" selected>--Categorie Kiezen--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

