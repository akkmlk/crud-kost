<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Kost | Tambah Kamar</title>

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
    <div class="main-container container-fluid">
        <h3 class="fw-bold text-center text-light pt-3">Tambah Jenis Kamar</h3>
        <form action="{{ route('kamar.store') }}" class="mt-4" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-2 mt-2">
                    <label class="fw-bold text-start text-light">Jenis Kamar</label>
                </div>
                <div class="col-lg-10 form-floating">
                    <input type="text" name="jenis" class="form-control bg-transparent border border-dark text-light" id="floatingInput" placeholder="Jenis Kamar">
                    <label for="floatingInput" class="ms-2 text-light">Jenis Kamar</label>
                    {{-- <select name="jenis" aria-label="Default select example" class="form-select text-light bg-transparent">
                        <option value="1" class=" text-dark">kecil</option>
                        <option value="2" class=" text-dark">sedang</option>
                        <option value="3" class=" text-dark">besar</option>
                    </select> --}}
                    @error('jenis')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="container-fluid d-flex bd-highlight rounded mt-5 p-2 shadow">
                <div class="flex-grow-1">
                    <a href="{{ route('kamar.index') }}" class="btn btn-outline-danger" title="Kembali"><i class="fa-solid fa-arrow-left"></i></a>
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