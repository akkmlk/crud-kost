<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Kost | Data Penghuni</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .navbar-container {
            /* background: linear-gradient(to left, #618ce7, #0236a7); */
            background-color: #618ce7;
        }

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
    <div class="container-fluid main-container p-4 pt-4">
        <nav class="navbar navbar-dark rounded navbar-container">
            <div class="container-fluid">
                <a href="" class="navbar-brand fw-bold fs-3">Data Penghuni</a>
                <form action="{{ route('penghuni.index') }}" class="d-flex" method="">
                    @csrf
                    <div class="form-floating">
                        <input type="search" name="keywords" id="floatingInput" value="{{ Request::get('keywords') }}" class="form-control bg-transparent rounded-pill p-2" placeholder="Cari Penghuni">
                        <label for="floatingInput" style="color: rgb(226, 226, 226);">Cari Penghuni</label>
                    </div>
                    <button type="submit" class="btn btn-outline-light ms-2 me-2" style="width: 60px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <a href="{{ route('penghuni.create') }}" class="btn btn-outline-light pt-3" style="width: 60px;"><i class="fa-solid fa-plus fw-bold"></i></a>
                </form>
            </div>
        </nav>
        <div class="table-responsive mt-3 rounded">
            <table class="table table-striped table-primary text-center align-top text-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id Penghuni</th>
                        <th scope="col">Jenis Kamar</th>
                        <th scope="col">Nama Penghuni</th>
                        <th scope="col">Jumlah Penghuni</th>
                        <th scope="col">Penjamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penghunis as $penghuni)  
                        <tr class="text-dark">
                            <td>{{ $penghuni->id }}</td>
                            <td>{{ $penghuni->jenis_kamar }}</td>
                            <td>{{ $penghuni->nama_penghuni }}</td>
                            <td>{{ $penghuni->address }}</td>
                            <td>{{ $penghuni->penjamin }}</td>
                            <td class="text-center">
                                <form action="{{ route('penghuni.destroy', $penghuni->id) }}" onsubmit="return confirm('Yakin dihapus?')" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('penghuni.edit', $penghuni->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $penghunis->withQueryString()->links() }}
        </div>
        <div class="d-flex">
            <a href="{{ route('kamar.index') }}" class="text-decoration-none p-2 rounded btn btn-outline-light">Table Lain</a>
            <form action="/logout" class="ms-2" method="POST" onsubmit="return confirm('Kamu Mau Logout?')">
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