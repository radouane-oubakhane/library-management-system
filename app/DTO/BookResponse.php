<?php

namespace App\DTO;

class BookResponse
{
    public function __construct(
        public int $id,
        public string $title,
        public string $author_first_name,
        public string $author_last_name,
        public string $category_name,
        public string $isbn,
        public string $description,
        public int $stock,
        public string $publisher,
        public string $published_at,
        public string $language,
        public string $edition,
    ) {
    }
}
