<table class="table">
    <thead>
        <tr>
            <th scope="col">Periode</th>
            <th scope="col">{{$awal}}</th>
            <th scope="col">{{$akhir}}</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nasabah</th>
            <th scope="col">Setor</th>
            <th scope="col">Tarik</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $tr )

        <tr>
            <td>{{$loop->iteration +1}}</td>
            <td>{{$tr->created_at }}</td>
            <td>{{$tr->nasabah->nama }}</td>
            <td>{{$tr->setor }}</td>
            <td>{{$tr->tarik }}</td>
            <td>{{ $tr->setor - $tr->tarik }}</td>
        </tr>

        @endforeach

        <tr>
            <td colspan="2">Total</td>
            <td>{{ $transaksi->sum('tarik') }}</td>
            <td>{{ $transaksi->sum('setor') }}</td>
            <td>{{ $transaksi->sum('setor') - $transaksi->sum('tarik')}}</td>
        </tr>

    </tbody>
</table>