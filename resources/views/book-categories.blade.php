<div>
    <h1>Les catégories</h1>
    <ul>
        @foreach($bookCategories as $bookCategory)
            <li>
                <a href="/book-categories/{{ $bookCategory->id }}">
                    {{ $bookCategory->name }}
                </a>
                <a href="{{ route('book-categories.edit', $bookCategory->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>

            </li>
        @endforeach
</div>
