<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">edit Nasabah</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body px-5">
                    <form wire:submit.prevent="update">
                        <div class="form-group row ">
                            <label for="nis" class="col-sm-2 col-form-label ">Nis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis"
                                    placeholder="Nis Nasabah" wire:model="nis">
                                @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="Nama"
                                    placeholder="Nama Nasabah" wire:model="nama">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nis" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                            <div class="col-sm-10 row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                        id="inputPassword2" placeholder="Tempat lahir" wire:model="tempat">
                                    @error('tempat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="inputPassword2" placeholder="Tanggal Lahir" wire:model="tanggal">
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>

                                <div class="col-sm-5 flex col">
                                    <div class="form-check">
                                        <input class="form-check-input @error('jenis') is-invalid @enderror"
                                            type="radio" name="gridRadios" id="gridRadios1" value="l"
                                            wire:model="jenis">
                                        <label class="form-check-label " for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('jenis') is-invalid @enderror"
                                            type="radio" name="gridRadios" id="gridRadios2" wire:model="jenis"
                                            value="p">
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                    @error('jenis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>


                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="" id="alamat" cols="4" rows="4"
                                    class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat"
                                    placeholder="alamat lengkap"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                    id="exampleFormControlFile1" wire:model="foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>


                        @if ($foto)
                        @php
                        try {
                        $url = $foto->temporaryUrl();
                        $fotoStatus = true;
                        }catch (RuntimeException $exception){
                        $this->fotoStatus = false;
                        }
                        @endphp
                        @if($fotoStatus)
                        <div class=" row">
                            <label for="foto" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">

                                <img src="{{ $url }}" alt="..." class="img-fluid" style="height:100px;">

                            </div>

                        </div>
                        @endif
                        @else
                        <div class=" row">
                            <label for="foto" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">

                                <img src="{{asset('storage/'.$foto_old)}}" alt="..." class="img-fluid"
                                    style="height:100px;">

                            </div>

                        </div>
                        @endif








                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>