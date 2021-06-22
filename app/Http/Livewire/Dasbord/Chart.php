<?php

namespace App\Http\Livewire\Dasbord;

use App\Models\nasabah;
use App\Models\transaksi;
use App\Models\warna;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class Chart extends Component
{





    public function transaksi()
    {

        $akhir = date("Y-m-d");
        $awal = date('Y-m-d', strtotime('-30' . ' days'));

        $transaksi = transaksi::select(DB::raw('sum(setor) as setor, sum(tarik) as tarik, date(created_at) as day'))
            ->whereBetween('updated_at',  [$awal, $akhir])
            ->groupBy('day')
            ->get();


        $data = [];

        $warna = warna::inRandomOrder()->limit(2)->get();

        foreach ($transaksi as $tr) {
            $data['labels'][] = $tr->day;
            $data['data_setor'][] = $tr->setor;
            $data['data_tarik'][] = $tr->tarik;
        }

        $data['warna_setor'] = '#' . $warna[0]->code;
        $data['warna_tarik'] = '#' . $warna[1]->code;

        return $data;
    }


    public function nasabah()
    {
        $nasabah = nasabah::orderBy('saldo', 'asc')->take(5)->get();
        $data['labels'] = $nasabah->pluck('nama');
        $data['data'] = $nasabah->pluck('saldo');

        $warna = warna::inRandomOrder()->limit(count($nasabah))->get();

        foreach ($warna as $s) {
            $data['backgroundColor'][] = '#' . $s->code;
        }

        return $data;
    }




    public function render()
    {
        return view('livewire.dasbord.chart');
    }
}
