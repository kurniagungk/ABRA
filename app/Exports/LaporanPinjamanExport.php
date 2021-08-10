<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPinjamanExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $data;


    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.laporanpinjaman', [
            'pinjaman' => $this->data['data'],
            'awal' => $this->data['awal'],
            'akhir' => $this->data['akhir'],
        ]);
    }
}
