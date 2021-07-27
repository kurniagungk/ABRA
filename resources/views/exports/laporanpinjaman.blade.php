<table class="table">
    <thead>
        <tr>
            <th scope="col">Periode</th>
            @if ($awal)
            <th scope="col">{{$awal}}</th>
            <th scope="col">{{$akhir}}</th>
            @else
            <th scope="col">Semua</th>
            <th scope="col"></th>
            @endif
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <tr></tr>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Di Bayar</th>
            <th scope="col">Total Pinjaman</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($pinjaman as $item)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>Rp. {{number_format($item->dibayar,2,',','.')  }}</td>
            <td>Rp. {{number_format($item->total,2,',','.')  }}</td>
            <td>
                {{ $item->status }}
            </td>

        </tr>

        @endforeach

    </tbody>
</table>