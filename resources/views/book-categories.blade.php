<div>
    <h1>Les catégories</h1>
    <ul>
        @foreach($bookCategories as $bookCategory)
            <li>
                <a href="/book-categories/{{ $bookCategory->id }}">
                    {{ $bookCategory->name }}
                </a>
            </li>
        @endforeach
</div>
