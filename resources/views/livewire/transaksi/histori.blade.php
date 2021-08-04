<div class="col-lg-7 col-sm-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Histori Saldo</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body px-5">


            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Tarik</th>
                            <th scope="col">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Saldo Histori</td>
                            <td>{{$saldoHistori['setor']}}</td>
                            <td>{{$saldoHistori['tarik']}}</td>
                            <td>{{$saldoHistori['setor'] - $saldoHistori['tarik']}}</td>
                        </tr>
                        @foreach ($transaksi as $tr )
                        @php
                        $saldo = $saldoHistori['setor'] - $saldoHistori['tarik'];
                        @endphp
                        <tr>
                            <td>{{$loop->iteration +1}}</td>
                            <td>{{$tr->created_at }}</td>
                            <td>{{$tr->setor }}</td>
                            <td>{{$tr->tarik }}</td>
                            <td>{{ $saldo + ($tr->setor - $tr->tarik )}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>


        </div>



    </div>
</div>