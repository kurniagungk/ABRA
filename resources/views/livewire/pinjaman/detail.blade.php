<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pinjaman</h1>

    </div>
    <div class="row">
        <div class="col-lg-5 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nasabah</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">


                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $pinjaman->tanggal }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Di Bayar</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"
                                value="Rp. {{number_format($pinjaman->dibayar,2,',','.')  }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Sisa Tagihan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"
                                value="Rp. {{number_format($pinjaman->tunggakan,2,',','.')  }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Total Pinjaman</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"
                                value="Rp. {{number_format($pinjaman->total,2,',','.')  }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <span
                                class=" {{ $pinjaman->status == "lunas" ? "badge badge-success" : "badge badge-danger" }}">{{ $pinjaman->status }}</span>
                        </div>
                    </div>
                    @if($pinjaman->status == "belum")
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <a type="button" class="btn btn-primary btn-lg btn-block mt-3"
                                href="{{ route('pinjaman.pembayaran', $pinjaman->id) }}">Bayar</a>
                        </div>
                    </div>

                    @endif



                </div>
            </div>
        </div>

        <div class="col-lg-7 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Histori Pembayaran</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjaman->paymen as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{date('d-m-Y', strtotime($item->created_at))  }}</td>
                                <td>Rp. {{number_format($item->jumlah,2,',','.')  }}</td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>




                </div>



            </div>
        </div>
    </div>

</div>