<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pinjaman</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body px-5">
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

                    <div class="d-sm-flex mb-3">
                        <div class="row col-lg-3 col-sm-12">

                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control" wire:model="status">
                                    <option value="">Semua</option>
                                    <option value="lunas">lunas</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>

                        </div>
                        <div class="row col-lg-3 col-sm-12">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">perpage</label>
                            <div class="col-sm-9">
                                <select class="form-control" wire:model="halaman">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>




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
                                    <th scope="col">#</th>
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
                                        <span
                                            class=" {{ $item->status == "lunas" ? "badge badge-success" : "badge badge-danger" }}">{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        @if ($item->status == "belum")
                                        <a class="btn btn-primary" href="{{ route('pinjaman.pembayaran', $item->id) }}"
                                            role="button">Pembayaran</a>
                                        @endif
                                        @if ($item->dibayar == 0)

                                        @if($pinjaman_id == $item->id)
                                        <button type="button" class="btn btn-danger mx-2"
                                            wire:click="delet('{{$item->id}}')">Yes</button>
                                        @else
                                        <button type="button" class="btn btn-warning mx-2"
                                            wire:click="$set('pinjaman_id', '{{$item->id}}')">Hapus</button>
                                        @endif

                                        @endif

                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
        </div>

    </div>



</div>