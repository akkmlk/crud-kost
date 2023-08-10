<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Kost | Tambah Penghuni</title>

    <style>
        .main-container {
            height: 100vh;
            background: linear-gradient(to right, #2b68ec, #012c88);
        }
    </style>

    <link rel="stylesheet" href="style/style_edit.css">
    @include('partials.bootstrap')
</head>
<body style="font-family: 'Poppins', sans-serif;">
    {{-- <h2>HAI {{ $penghunis->kamar->jenis_kamar }}</h2> --}}
    <div class="main-container container-fluid">
        <h3 class="fw-bold text-center text-light pt-3">Tambah Penghuni</h3>
        <form action="{{ route('penghuni.store') }}" class="mt-4" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Nama Penghuni</label>
                </div>
                <div class="col-lg-10 form-floating mb-2">
                    <input type="text" name="name" class="form-control bg-transparent shadow @error('name') is-invalid @enderror" id="floatingInput" placeholder="Nama Penghuni">
                    <label for="floatingInput" class="ms-2 text-light">Nama Penghuni</label>
                    @error('name')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>

                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Pilih Jenis Kamar</label>
                </div>
                <div class="col-lg-10">
                    <select name="jenis" aria-label="Default select example" class="form-select text-light bg-transparent">
                        @foreach ($kamars as $kamar)
                            {{-- @foreach ($kamars as $kamar) --}}
                                <option value="{{ $kamar->id }}" class=" text-dark">{{ $kamar->jenis_kamar }}</option>
                            {{-- @endforeach --}}
                            {{-- <option value="2" class=" text-dark">sedang</option>
                            <option value="3" class=" text-dark">besar</option> --}}
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>

                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Alamat</label>
                </div>
                <div class="col-lg-10 form-floating mb-2">
                    <input type="text" name="alamat" class="form-control bg-transparent @error('luas') is-invalid @enderror" id="floatingInput" placeholder="Alamat">
                    <label for="floatingInput" class="ms-2 text-light">Alamat</label>
                    @error('luas')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
                
                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Penjamin</label>
                </div>
                <div class="col-lg-10 form-floating mb-2">
                    <input type="text" name="penjamin" class="form-control bg-transparent @error('luas') is-invalid @enderror" id="floatingInput" placeholder="Penjamin">
                    <label for="floatingInput" class="ms-2 text-light">Penjamin</label>
                    @error('luas')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="container-fluid d-flex bd-highlight rounded mt-5 p-2 shadow">
                <div class="flex-grow-1">
                    <a href="{{ route('penghuni.index') }}" class="btn btn-outline-danger mt-2" title="Kembali"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="reset" class="btn btn-outline-warning" title="Reset"><i class="fa-sharp fa-solid fa-xmark"></i></button>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="submit" class="btn btn-outline-primary" title="Simpan"><i class="fa-solid fa-check"></i></button>
                </div>
            </div>
        </form>
    </div>

    {{-- JS Toastr Link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "Waduh")
        @endif
    </script>
</body>
</html>