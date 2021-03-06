<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
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

                    <div class="d-sm-flex justify-content-between m-2">
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
                        <div class="row col-lg-5 col-sm-12">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pencarian</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama / NIs"
                                    wire:model="search">
                            </div>
                            <button class="btn btn-primary col-sm-3 my-1" wire:click="export">Export Data</button>
                        </div>



                    </div>


                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <div class="row">
                                            <a type="button" href="{{ route('user.edit', ['id'=>$item->id]) }}"
                                                class="btn btn-primary mx-2">Edit</a>
                                            @if($user_id == $item->id)
                                            <button type="button" class="btn btn-danger mx-2"
                                                wire:click="delet({{$item->id}})">Yes</button>
                                            @else
                                            <button type="button" class="btn btn-warning mx-2"
                                                wire:click="$set('user_id', {{$item->id}})">Hapus</button>
                                            @endif
                                        </div>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                        {{ $user->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>



</div>