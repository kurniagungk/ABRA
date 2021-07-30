<div class="container-fluid">


    <div class="row">
        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pinjaman</h6>
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


                        <div class="form-group row ">
                            <label for="nis" class="col-sm-2 col-form-label ">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" wire:model="status">
                                    <option value="">Semua</option>
                                    <option value="lunas">lunas</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Tanggal</label>

                            <div class="col-sm-10 row">
                                <div class="col-sm-2 ">
                                    <input class="form-check-input mx-auto mt-2" type="checkbox" wire:model="tanggal"
                                        id="defaultCheck1">
                                </div>
                                @if ($tanggal)
                                <div class="col-sm-5">
                                    <input type="date" class="form-control @error('awal') is-invalid @enderror"
                                        id="awal" placeholder="Nama Nasabah" wire:model="awal">
                                    @error('awal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control @error('akhir') is-invalid @enderror"
                                        id="akhir" placeholder="Nama Nasabah" wire:model="akhir">
                                    @error('akhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                @endif


                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Lihat
                            </button>
                        </div>


                    </form>

                </div>



            </div>
        </div>
    </div>


    @if ($pinjaman)
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
                        <div class="col-sm-1">Status</div>

                        <div class="col-sm-5">{{$status ??'semua'}}</div>

                    </div>

                    <div class="row my-3">
                        <div class="col-sm-1">Periode</div>
                        @if ($tanggal)
                        <div class="col-sm-5">{{$awal}} - {{$akhir}}</div>
                        @else
                        <div class="col-sm-5">Semua</div>
                        @endif


                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>Rp. {{number_format($item->dibayar,2,',','.')  }}</td>
                                    <td>Rp. {{number_format($item->total,2,',','.')  }}</td>
                                    <td>
                                        <span
                                            class=" {{ $item->status == "lunas" ? "badge badge-success" : "badge badge-danger" }}">{{ $item->status }}</span>
                                    </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-center">Total</td>
                                    <td>{{ $pinjaman->sum('dibayar') }}</td>
                                    <td>{{ $pinjaman->sum('total') }}</td>
                                </tr>


                            </tbody>
                        </table>


                    </div>



                </div>



            </div>
        </div>
    </div>

    @endif





</div>