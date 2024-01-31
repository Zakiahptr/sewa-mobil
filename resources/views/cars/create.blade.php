@extends('include.app' , ['title' => ' Tambah Mobil'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Mobil</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="d-flex  mb-4">
                Tanda (
                <h5 class="text-danger ml-2  mr-2"> * </h5>
                ) Wajib diisi
            </div>
            <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="d-flex" for="inputMerk">Merek Mobil<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror"
                     name="merk" id="inputmerk" value="{{old('merk')}}">
                     @error('merk')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputModel">Model Mobil<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror"
                     name="model" id="inputModel" value="{{old('model')}}">
                     @error('model')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputModel">No. Plat<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('plat') is-invalid @enderror"
                     name="plat" id="inputModel" value="{{old('plat')}}">
                     @error('plat')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputModel">Tarif Sewa Perhari (Rp.)<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                     name="price" id="inputModel" value="{{old('price')}}">
                     @error('price')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex">Gambar (MAKS: 2MB) <h5 class="text-danger ml-2"> * </h5></label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                     name="img" value="{{old('img')}}">
                     @error('img')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class=" btn btn-lg btn-primary">Tambah</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
