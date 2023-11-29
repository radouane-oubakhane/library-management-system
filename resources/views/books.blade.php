<div>
    <h1>Books</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author Fist Name</th>
                <th>Author Last Name</th>
                <th>Category</th>
                <th>ISBN</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Publisher</th>
                <th>Published Date</th>
                <th>Language</th>
                <th>Edition</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author_first_name }}</td>
                    <td>{{ $book->author_last_name }}</td>
                    <td>{{ $book->category_name }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->published_at }}</td>
                    <td>{{ $book->language }}</td>
                    <td>{{ $book->edition }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
