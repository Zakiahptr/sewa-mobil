@extends('include.app' , ['title' => ' Edit Detail Mobil'])

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Detail Mobil</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex  mb-4">
                Tanda (
                <h5 class="text-danger ml-2  mr-2"> * </h5>
                ) Wajib diisi
            </div>
            <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label class="d-flex" for="inputMerk">Merek Mobil<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror"
                     name="merk" id="inputMerk" value="{{old('merk') ?? $car->merk}}">
                     @error('merk')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputModel">Model Mobil<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror"
                     name="model" id="inputModel" value="{{old('model') ?? $car->model}}">
                     @error('model')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputPlat">No. Plat<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('plat') is-invalid @enderror"
                     name="plat" id="inputPlat" value="{{old('plat') ?? $car->plat}}">
                     @error('plat')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex" for="inputprice">Tarif Sewa Perhari (Rp.)<h5 class="text-danger ml-2"> *</h5> </label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                     name="price" id="inputPrice" value="{{old('price') ?? $car->price}}">
                     @error('price')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <label class="d-flex">Gambar (MAKS: 2MB) <h5 class="text-danger ml-2"> * </h5></label>
                    <img class="mb-2" src="{{ $car->img() }}" width="100px">
                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                     name="img" value="{{old('img')}}">
                     @error('img')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class=" btn btn-lg btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
