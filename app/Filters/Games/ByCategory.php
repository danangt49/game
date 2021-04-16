<?php
// TypeFilter.php
namespace App\Filters\Books;
class ByCategory {
    public function filter($builder, $value) {
      $filter = $builder->where('category_id', $value);
      return $filter;
    }
}
