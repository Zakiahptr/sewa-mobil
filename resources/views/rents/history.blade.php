@extends('include.app' , ['title' => 'Riwayat Peminjaman'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Pemesanan</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Dipinjam</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Merek Mobil</th>
                            <th scope="col">No. Plat</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Tarif Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rents as $rent)
                        <tr>
                            @if ($rent->status == 'Dipinjam')
                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                            {{-- @foreach ($rent->car() as $car) --}}
                            <td>{{ $rent->car->merk}}</td>
                            <td>{{ $rent->car->plat }}</td>
                            {{-- @endforeach --}}
                            <td>{{ $rent->start }}</td>
                            <td>{{ $rent->end }}</td>
                            <td>{{ $rent->total_price }}</td>
                            <td>{{ $rent->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('rentsHistory.detail', $rent->id )}}" class="btn btn-success m-2" data-toggle="tooltip" title="Pengembalian"><i class="fas fa-undo-alt"></i> Pengembalian</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Sudah Dikembalikan</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Merek Mobil</th>
                            <th scope="col">No. Plat</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Tarif Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rents as $rent)
                        <tr>
                            @if ($rent->status == 'Sudah Dikembalikan')
                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                            <td>{{ $rent->car->merk}}</td>
                            <td>{{ $rent->car->plat }}</td>
                            <td>{{ $rent->start }}</td>
                            <td>{{ $rent->end }}</td>
                            <td>{{ $rent->total_price }}</td>
                            <td>{{ $rent->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('rentsHistory.detail', $rent->id )}}" class="btn btn-secondary m-2" data-toggle="tooltip" title="Lihat Detail"><i class="fas fa-eye"></i> Detail</a>
                            </td>
                            @endif
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
