<div>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Device</h1>

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        @if ($user_devices->count())
            <!-- DataTales Example -->
            <div class="btn-group mb-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ $current_device->name }}
                </button>
                <div class="dropdown-menu">
                    @foreach ($user_devices as $device)
                        <a class="dropdown-item"
                            href="/data?device={{ $device->device->id }}">{{ $device->device->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between mx-2 align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        <form class="form-inline" wire:submit.prevent='search'>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputSearch" class="sr-only">Search</label>
                                <input type="text" wire:model='search' name="search" class="form-control"
                                    id="inputSearch" placeholder="Search">
                            </div>
                            {{--
                            <button type="button" class="btn btn-secondary mb-2 ml-3" data-toggle="modal"
                                data-target="#createModal">Add Data</button> --}}
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            @if ($data->count())
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Speed</th>
                                        <th>Create At</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                @foreach ($data as $key => $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $key + $data->firstItem() }}</td>
                                            <td>{{ $item->speed }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            {{-- <td>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editModal"
                                                        wire:click='show({{ $item->id }})'>Edit</button>
                                                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        wire:click='show({{ $item->id }})'>Delete</button>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    </tbody>
                                @endforeach
                            @endif
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- /.container-fluid -->

    <script>
        window.addEventListener('closeCreateModal', event => {
            $('#createModal').modal('hide')
        })
        window.addEventListener('closeEditModal', event => {
            $('#editModal').modal('hide')
        })
    </script>
</div>
