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
            <td>{{$tr->tarik }}</td>
            <td>{{$tr->setor }}</td>
            <td>{{ $tr->setor - $tr->tarik }}</td>
        </tr>

        @endforeach

    </tbody>
</table>