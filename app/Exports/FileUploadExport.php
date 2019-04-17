<?php

namespace App\Exports;

use App\FileUpload;
use Maatwebsite\Excel\Concerns\FromCollection;

class FileUploadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FileUpload::all();
    }
}
