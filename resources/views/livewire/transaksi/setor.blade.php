<div class="container-fluid">


    <div class="row">
        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Setor Tunai</h6>

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

                            <input type="text" class="form-control @error('nis') is-invalid @enderror" autofocus
                                wire:model.prevent="nis" placeholder="Username" id="nis" autofocus
                                aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
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

    @if ($nasabah)




    <div class="row">
        <div class="col-lg-5 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Nasabah</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">

                    <div class="d-flex justify-content-center overflow-hidden mb-3 ">
                        <img src="https://inwepo.co/wp-content/uploads/2020/03/Tampilkan-token.jpg" alt=""
                            style="height:200px; width: 200px" class="rounded mx-auto border">
                    </div>



                    <form wire:submit.prevent="save">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nis</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{$nasabah->nis}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{$nasabah->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{$nasabah->saldo}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control  @error('setor') is-invalid @enderror" id="setor"
                                    wire:model="setor" autocomplete="off">
                                @error('setor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Setor</button>
                            </div>
                        </div>

                    </form>






                </div>



            </div>
        </div>

        <livewire:transaksi.histori :nasabah="$nasabah" />

    </div>

    @endif







</div>


<script src="{{ asset('js/sweetalert2.js') }}"></script>

<script>
    Livewire.on('nis', () => {
        document.getElementById('setor').focus();
    });

    Livewire.on('start', () => {
        Swal.fire('Berhasil Setor Tunai').then(() => {
            document.getElementById('nis').focus();
    })
    });


</script>