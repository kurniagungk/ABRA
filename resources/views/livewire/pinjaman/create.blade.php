<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pinjaman</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body px-5">
                    <form wire:submit.prevent="store">
                        <div class="form-group row ">
                            <label for="nis" class="col-sm-2 col-form-label ">Saldo Tabungan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" readonly
                                    value="Rp. {{ number_format($saldo,2,',','.') }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Pinjaman</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" placeholder="Nama Nasabah" wire:model="tanggal">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="Nama" placeholder="Jumlah Pinjaman" wire:model="jumlah">
                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="" id="alamat" cols="4" rows="4"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                    wire:model="keterangan" placeholder="keterangan"></textarea>
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>