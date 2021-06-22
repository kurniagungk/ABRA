<table>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nis</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nasabah as $item)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nis}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenis == 'l' ? "Laki - Laki" : "Wanita"}}</td>
            <td>{{$item->tempat_lahir}}, {{$item->tgl_lahir}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->saldo}}</td>
        </tr>
        @endforeach


    </tbody>
</table>