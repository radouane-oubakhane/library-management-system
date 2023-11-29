<div>
    @foreach ($member as $m  )
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <h2>{{$m->first_name}} {{$m->last_name}}  </h2>

    <h3>{{$m->email}} </h3>
    <h4>{{$m->phone}} </h4>
    <p>les livres emprunter</p>
    <ul>
        @foreach ($m->bookCopy as $book)
            <li>
                titre {{ $book->title }} /
                date d'emprunter {{$book->borrow_date}} /
                 l'etat d'emprunte   {{ $book->status }}

            </li>
        @endforeach
    </ul>
    @endforeach
</div>
