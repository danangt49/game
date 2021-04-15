<?php

namespace App\Exports;
use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;


class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::select(
            'id', 
            'kodebuku', 
            'title',
            'description',
            'harga_sewa', 
            'harga_pinjam', 
            'harga_beli', 
            'qty_sewa', 
            'qty_pinjam', 
            'qty_beli',
            'halaman', 
            'publish_at', 
            'isbn', 
            'bahasa', 
            'read',
            'picture', 
            'category_id', 
            'files',
            'author',
            'publisher_id',
            'min_sewa',
            'min_pinjam', 
            'statusbuku', 
            'totalpeminjaman', 
            'bukufisik',
            'ebook'
        )->get();
        
    }
}
