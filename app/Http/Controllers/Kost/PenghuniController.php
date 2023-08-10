<?php

namespace App\Http\Controllers\Kost;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Penghuni $penghunis, Request $request)
    {
        $keywords = $request->keywords;

        $penghunis = DB::table('kamars')
        ->join('penghunis', 'penghunis.kamar_id', '=', 'kamars.id')
        ->get();

        if (strlen($keywords)) {
            $penghunis = DB::table('kamars')
            ->join('penghunis', 'penghunis.kamar_id', '=', 'kamars.id')
            ->where('nama_penghuni', 'like', "%$keywords%")
            ->orWhere('jenis_kamar', 'like', "%$keywords%")
            ->paginate(4);
        } else {
            $penghunis = DB::table('kamars')
            ->join('penghunis', 'penghunis.kamar_id', '=', 'kamars.id')
            ->paginate(4);
        }

        // $data_penghuni = Penghuni::oldest()->paginate(2);
        
        return view('penghuni.index_penghuni', compact(['penghunis']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $jenis_kamar = kamar::where('jenis_kamar', $jenis_kamar);
        // $penghunis = Penghuni::oldest();
        // $penghunis = Penghuni::all();
        // $kamars = DB::table('kamars')->where('jenis_kamar')->get();
        $kamars = kamar::oldest()->paginate(10);
        $penghunis = DB::table('kamars')
        ->join('penghunis', 'penghunis.kamar_id', '=', 'kamars.id')
        ->paginate(10);

        return view('penghuni.create_penghuni', compact(['kamars', 'penghunis']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'alamat' => 'required',
            'penjamin' => 'required'
        ], [
            'name.required' => "Nama Wajib Diisi",
            'name.min' => "Minimal nama 3 karakter",
            'name.max' => "Maksimal nama 255 Karakter",
            'alamat.required' => "Alamat Wajib Diisi",
            'penjamin.required' => "penjamin Wajib Diisi",
        ]);

        // return $request;
        // $new_kamar = kamar::create($request->except(['_token']));
        $new_kamar = Penghuni::create([
            'kamar_id' => $request->jenis,
            'nama_penghuni' => $request->name,
            'address' => $request->alamat,
            'penjamin' => $request->penjamin,
        ]);

        if ($new_kamar) {
            return redirect()->route('penghuni.index')->with(['info' => "Berhasil Menambahkan Kamar"]);
        } else {
            return back()->with(['error' => "Gagal Menambahkan Kamar"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $select_penghuni = Penghuni::where('id', $id)->first();
        // $kamars = kamar::latest()->paginate(10);
        // $kamars_id = Penghuni::where('kamar_id')->get();
        $kamars = DB::select('SELECT * FROM kamars');

        return view('penghuni.edit_penghuni', compact(['select_penghuni', 'kamars']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $update_penghuni =

        $request->validate([
            'name' => 'required|min:3|max:255',
            'jenis' => 'required',
            'alamat' => 'required',
            'penjamin' => 'required',
        ], [
            'name.required' => "Nama Wajib Diisi",
            'name.min' => "Minimal Karakter 3",
            'name.max' => "Maksimal Karakter 255",
            'jenis.required' => "Jenis Wajib Diisi",
            'alamat.required' => "Alamat Wajib Diisi",
            'penjamin.required' => "Penjamin Wajib Diisi",
        ]);

        $update_penghuni = DB::table('penghunis')->where('id', $id)->update([
            'nama_penghuni' => $request->name,
            'kamar_id' => $request->jenis,
            'address' => $request->alamat,
            'penjamin' => $request->penjamin,
        ]);

        if ($update_penghuni) {
            return redirect()->route('penghuni.index')->with(['info' => "Penghuni Berhasil di Update"]);
        } else {
            return back()->with(['error' => "Penghuni Gagal di Update"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('penghunis')->where('id', $id)->delete();
        return back()->with(['info' => "Berhasil Menghapus Data Penghuni"]);
    }
}
