<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Kost | Data Kamar Kost</title>

    <link rel="stylesheet" href="style/style.css">
    @include('partials.bootstrap')

    {{-- CSS Toastr Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Cdn Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="container-fluid main-container p-4 pt-4">
        <nav class="navbar navbar-dark rounded navbar-container">
            <div class="container-fluid">
                <a href="" class="navbar-brand fw-bold fs-3">Data Kamar</a>
                <form action="{{ route('kamar.index') }}" class="d-flex" method="">
                    @csrf
                    <div class="form-floating">
                        <input type="search" name="keywords" id="floatingInput" value="{{ Request::get('keywords') }}" class="form-control bg-transparent rounded-pill p-2" placeholder="Cari Kamar">
                        <label for="floatingInput" style="color: rgb(226, 226, 226);">Cari Kamar</label>
                    </div>
                    <button type="submit" class="btn btn-outline-light ms-2 me-2" style="width: 60px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <a href="{{ route('kamar.create') }}" class="btn btn-outline-light pt-3" style="width: 60px;"><i class="fa-solid fa-plus fw-bold"></i></a>
                </form>
            </div>
        </nav>
        <div class="table-responsive mt-3 rounded">
            <table class="table table-striped table-primary text-center align-top text-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">No Kamar</th>
                        <th scope="col">Jenis Kamar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamars as $kamar)
                        <tr class="text-dark">
                            <td>{{ $kamar->id }}</td>
                            <td>{{ $kamar->jenis_kamar }}</td>
                            <td class="text-center">
                                <form action="{{ route('kamar.destroy', $kamar->id) }}" onsubmit="return confirm('Yakin dihapus?')" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kamars->withQueryString()->links() }}
        </div>
        <div class="d-flex">
            <a href="{{ route('penghuni.index') }}" class="text-decoration-none p-2 rounded btn btn-outline-light me-2">Table Lain</a>
            <form action="/logout" class="" method="POST" onsubmit="return confirm('Kamu Mau Logout?')">
                @csrf
                <button class="btn btn-outline-light p-2"><i class="fa-solid fa-right-from-bracket" data-toggle="tooltip" title="Keluar"></i></button>
            </form>
        </div>
    </div>
    @include('partials.bootstrap_js')

    {{-- JS Toastr Link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}", "Mantap")
        @elseif (Session::has('warningAkses'))
            toastr.warning("{{ Session::get('warningAkses') }}")
        @endif
    </script>
</body>
</html>