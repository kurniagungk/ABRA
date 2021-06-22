<?php

namespace App\Exports;

use App\Models\nasabah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NasabahExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.nasabah', [
            'nasabah' => nasabah::all()
        ]);
    }
}
