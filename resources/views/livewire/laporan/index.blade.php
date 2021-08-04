<div class="container-fluid">


    <div class="row">
        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">

                    <form wire:submit.prevent="find">

                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        @if (session()->has('danger'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div class="input-group">


                            <div class="input-group-prepend col-sm-12 col-lg-5">
                                <input type="date" class="form-control" wire:model="awal">
                            </div>
                            <div class="input-group-prepend col-sm-12 col-lg-5">
                                <input type="date" class="form-control" wire:model="akhir">
                            </div>
                            <div class="input-group-prepend col-sm-12 col-lg-2">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i> Lihat</button>
                            </div>
                            @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                    </form>

                </div>



            </div>
        </div>
    </div>


    @if ($transaksi)
    <div class="row">
        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                    <div class="dropdown no-arrow">
                        <button class="btn btn-success" wire:click="export">Export</button>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">


                    <div class="row my-3">
                        <div class="col-sm-1">Periode</div>
                        <div class="col-sm-5">{{$awal}} - {{$akhir}}</div>

                    </div>


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
                            @foreach ($transaksi as $tr )

                            <tr>
                                <td>{{$loop->iteration +1}}</td>
                                <td>{{$tr->created_at }}</td>
                                <td>{{$tr->setor }}</td>
                                <td>{{$tr->tarik }}</td>
                                <td>{{ $tr->setor - $tr->tarik }}</td>
                            </tr>

                            @endforeach

                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                <td>{{ $transaksi->sum('tarik') }}</td>
                                <td>{{ $transaksi->sum('setor') }}</td>
                                <td>{{ $transaksi->sum('setor') - $transaksi->sum('tarik')}}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>



            </div>
        </div>
    </div>

    @endif





</div>