<?php

namespace App\Imports;
use App\Publisher;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PublisherImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Publisher::create([
            'name'          => $row[1],
            'created_at'    => $row[2],
            'updated_at'    => $row[3],
            ]);
        }
    }
}
