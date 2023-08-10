<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Kost | Edit Kamar</title>

    <style>
        .main-container {
            height: 100vh;
            background: linear-gradient(to right, #2b68ec, #012c88);
        }
    </style>

    @include('partials.bootstrap')

    {{-- CSS Toastr Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Cdn Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="container-fluid main-container">
        <h3 class="fw-bold text-center pt-4 text-light">Update Kamar</h3>
        <form action="{{ route('kamar.update', $select_kamar->id) }}" class="mt-4" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Jenis Kamar</label>
                </div>
                <div class="col-lg-10 form-floating">
                    <input type="text" name="jenis" class="form-control text-light shadow bg-transparent border border-dark @error('jenis') is-invalid @enderror" id="floatingInput" placeholder="Update Jenis Kamar ..." value="{{ $select_kamar->jenis_kamar }}">
                    <label for="floatingInput" class="ms-3 text-light">Update Jenis Kamar ...</label>
                    @error('jenis')
                        <div class="text-start invalid-feedback">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Luas Kamar</label>
                </div>
                <div class="col-lg-10 form-floating">
                    <input type="text" name="luas" class="form-control text-light shadow bg-transparent border border-dark @error('luas') is-invalid @enderror" id="floatingInput" placeholder="Update Luas Kamar ..." value="{{ $select_kamar->luas_kamar }}">
                    <label for="floatingInput" class="ms-3 text-light">Update Luas Kamar ...</label>
                    @error('luas')
                        <div class="text-start invalid-feedback">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="row mb-3">
                <div class="col-lg-2 mt-3">
                    <label class="fw-bold text-start text-light">Status Kamar</label>
                </div>
                <div class="col-lg-10">
                    <select name="status" aria-label="Default select example" class="form-control text-light bg-transparent border border-dark @error('status') is-invalid @enderror">
                        <option value="1" @if($select_kamar->status == "terisi") selected @endif class="text-dark">terisi</option>
                        <option value="2" @if($select_kamar->status == "kosong") selected @endif class="text-dark">kosong</option>
                    </select>
                    @error('status')
                        <div class="text-start invalid-feedback">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div> --}}
            <div class="container-fluid d-flex bd-highlight p-2 mt-4 rounded shadow">
                <div class="flex-grow-1">
                    <a href="{{ route('kamar.index') }}" class="btn btn-outline-danger" title="Kembali"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <div class="bd-highlight p-2">
                    <button type="reset" title="Reset" class="btn btn-outline-warning"><i class="fa-sharp fa-solid fa-xmark"></i></button>
                </div>
                <div class="bd-highlight p-2">
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