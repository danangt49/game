<?php
// ProductFilter.php
namespace App\Filters\Books;
use App\Filters\Books\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class BooksFilter extends AbstractFilter {
    protected $filters = [
        'category_id' => ByCategory::class,
        'title' => ByTitle::class
    ];
}
