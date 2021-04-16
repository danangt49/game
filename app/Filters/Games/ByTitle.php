<?php
// TypeFilter.php
namespace App\Filters\Books;
class ByTitle {
    public function filter($builder, $value) {
      $filter = $builder->where('title', 'LIKE', "%{$value}%");
      return $filter;
    }
}
