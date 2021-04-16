<?php

namespace App\Exports;

use App\Publisher;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublisherExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Publisher::select('id', 'name', 'created_at', 'updated_at')->get();
    }
}
