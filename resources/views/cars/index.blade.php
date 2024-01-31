@extends('include.app' , ['title' => 'Menejemen Mobil'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Menejemen Mobil</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="text-right mb-3">
                <a class="btn btn-primary" href="{{ route('cars.create') }}"><i class="fas fa-plus mr-2"></i> Tambah</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Merek Mobil</th>
                            <th scope="col">Model Mobil</th>
                            <th scope="col">No. Plat</th>
                            <th scope="col">Tarif perhari</th>
                            <th scope="col">aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cars as $car)
                        <tr>
                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                            <td><img src="{{ $car->img() }}" width="150px" alt=""></td>
                            <td>{{ $car->merk }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->plat }}</td>
                            <td>Rp. {{ number_format($car->price,0,',','.') }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('cars.destroy', $car->id )}}" class="">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('cars.edit', $car->id )}}" class="btn btn-warning m-2" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                    <button class="btn btn-danger m-2 confirmDelete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection

@if (Session::has('status'))
    @push('script')
        <script>
            Swal.fire({
            icon: 'success',
            title: "{{ Session::get('status') }}",
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endpush
@endif
