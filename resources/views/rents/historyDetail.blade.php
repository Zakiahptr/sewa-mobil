@extends('include.app' , ['title' => ' Detail Peminjaman'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Peminjaman</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="d-flex  mb-4">
                Tanda (
                <h5 class="text-danger ml-2  mr-2"> * </h5>
                ) Wajib diisi
            </div>
            <form method="POST" action="{{ route('rentsHistory.return', $rent->id) }}">
                @csrf
                @method('PATCH')

                <input type="hidden" class="form-control" name="car_id" value="{{ $rent->car_id }} ">
                <div class="text-center">
                    <img src="{{ $rent->car->img() }}" class="img-fluid" width="300px">
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputmerk">Merek Mobil  </label>
                        <input type="text" class="form-control"
                         id="inputmerk" name="merk" value="{{ $rent->car->merk }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputmodel">Model Mobil  </label>
                        <input type="text" class="form-control"
                         id="inputmodel" name="model" value="{{ $rent->car->model }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputplat">No. Plat </label>
                        <input type="text" class="form-control"
                         id="inputplat" name="plat" value="{{ $rent->car->plat }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputprice">Tarif Sewa Perhari </label>
                        <input type="text" class="form-control"
                         id="inputprice" name="price" value="Rp. {{ number_format($rent->car->price,0,',','.') }}" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputstart">Tanggal Mulai </label>
                        <input type="text" class="form-control"
                         id="inputstart" name="start" value="{{ old('start') ?? $rent->start }} " readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputend">Tanggal Selesai </label>
                        <input type="text" class="form-control"
                         id="inputend" name="end" value="{{ old('end') ?? $rent->end }} " readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputduration">Durasi Peminjaman </label>
                        <input type="text" class="form-control"
                         id="inputduration" name="duration" value="{{ old('duration') ?? $rent->duration }} Hari" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputtotalprice">Total Tarif Peminjaman </label>
                        <input type="text" class="form-control"
                         id="inputtotalprice" name="total_price" value="Rp. {{ number_format($rent->total_price,0,',','.') }} " disabled>
                    </div>

                </div>
                @if ($rent->status == 'Dipinjam')
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Proses Pengembalian</button>
                    </div>
                </div>
                @endif

            </form>
        </div>
    </div>
</section>
@endsection
