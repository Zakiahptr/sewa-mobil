@extends('include.app' , ['title' => ' Peminjaman Mobil'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Peminjaman Mobil</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="d-flex  mb-4">
                Tanda (
                <h5 class="text-danger ml-2  mr-2"> * </h5>
                ) Wajib diisi
            </div>
            <form method="POST" action="{{ route('rent.store') }}">
                @csrf
                <div class="text-center">
                    <img src="{{ $car->img() }}" class="img-fluid" width="300px">
                </div>

                <input type="hidden" class="form-control" name="car_id" value="{{ $car->id }} ">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputmerk">Merek Mobil  </label>
                        <input type="text" class="form-control"
                         id="inputmerk" name="merk" value="{{old('merk') ?? $car->merk }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputmodel">Model Mobil  </label>
                        <input type="text" class="form-control"
                         id="inputmodel" name="model" value="{{old('model') ?? $car->model }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputplat">No. Plat </label>
                        <input type="text" class="form-control"
                         id="inputplat" name="plat" value="{{old('plat') ?? $car->plat }} " disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputprice">Tarif Sewa Perhari </label>
                        <input type="text" class="form-control"
                         id="inputprice" name="price" value="Rp. {{ number_format($car->price,0,',','.') }}" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputstart">Tanggal Mulai <h5 class="text-danger ml-2"> *</h5> </label>
                        <input type="date" class="form-control @error('start') is-invalid @enderror"
                         id="inputstart" name="start" value="{{old('start')}}">
                         @error('start')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="d-flex" for="inputend">Tanggal Selesai <h5 class="text-danger ml-2"> *</h5> </label>
                        <input type="date" class="form-control @error('end') is-invalid @enderror"
                         id="inputend" name="end" value="{{old('end')}}">
                         @error('end')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-lg btn-block btn-primary">Proses Peminjaman</button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection

@if (Session::has('status'))
    @push('script')
        <script>
            Swal.fire({
            icon: 'error',
            title: "{{ Session::get('status') }}",
            showConfirmButton: true,
            })
        </script>
    @endpush
@endif
