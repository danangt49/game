<?php

namespace App\Imports;
use App\Book;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BookImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Book::create([
            'kodebuku'       => $row[1],
            'title'          => $row[2],
            'description'    => $row[3],
            'harga_sewa'     => $row[4],
            'harga_pinjam'   => $row[5],
            'harga_beli'     => $row[6],
            'qty_sewa'       => $row[7],
            'qty_pinjam'     => $row[8],
            'qty_beli'       => $row[9],
            'halaman'        => $row[10],
            'publish_at'     => $row[11],
            'isbn'           => $row[12],
            'bahasa'         => $row[13],
            'read'           => $row[14],
            'picture'        => $row[15],
            'category_id'    => $row[16],
            'files'          => $row[17],
            'author'         => $row[18],
            'publisher_id'   => $row[19],
            'min_sewa'       => $row[20],
            'min_pinjam'     => $row[21],
            'statusbuku'     => $row[22],
            'totalpeminjaman'=> $row[23],
            'bukufisik'      => $row[24],
            'ebook'          => $row[25]
            ]);
        }
    }
}
