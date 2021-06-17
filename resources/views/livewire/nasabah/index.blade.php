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


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">foto</th>
                                <th scope="col">#</th>
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
                                <td>
                                    <img src="{{asset('storage/'.$item->foto)}}" alt="" style="height:50px;">
                                </td>
                                <td>
                                    <a type="button" href="{{ route('nasabah.edit', ['id'=>$item->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    @if($nasabah_id == $item->id)
                                    <button type="button" class="btn btn-danger mx-2"
                                        wire:click="delet({{$item->id}})">Yes</button>
                                    @else
                                    <button type="button" class="btn btn-warning mx-2"
                                        wire:click="$set('nasabah_id', {{$item->id}})">Hapus</button>
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