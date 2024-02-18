<div class=" position-sticky" style=" top:80px">
    <div class=" search-form mb-4 ">
        <p class=" mb-2 fw-bold">Article Search</p>
        <form action="">
            <div class="input-group">
                <input type="text" class=" form-control" value="{{ request()->keyword }}" name="keyword">
                <button class=" btn btn-dark">
                    <i class=" bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class=" mb-4 categories">
        <p class=" mb-2 fw-bold">Article Categories</p>
            <div class="list-group">
                <a class="list-group-item list-group-item-action" 
                    href="{{ route('index') }}">
                All Category List    </a>
                @foreach (App\Models\Category::all() as $category)
                    <a class="list-group-item list-group-item-action" 
                    href="{{ route('categorized',$category->slug) }}">{{ $category->title }}</a>
                @endforeach
            </div>
    </div>
    <div class=" mb-4 categories">
        <p class=" mb-2 fw-bold">Recent Articles</p>
            <div class="list-group">
                @foreach (App\Models\Article::latest("id")->limit(5)->get() as $article)
                    <a class="list-group-item list-group-item-action" 
                    href="{{ route('detail',$article->slug) }}">{{ $article->title }}</a>
                @endforeach
            </div>
    </div>
</div>
