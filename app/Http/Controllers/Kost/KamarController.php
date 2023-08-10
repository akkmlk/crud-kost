<?php

namespace App\Http\Controllers\Kost;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = 5;

        $keywords = $request->keywords;
        if (strlen($keywords)) {
            $kamars = kamar::where('jenis_kamar', 'like', "%$keywords%")
            ->paginate($pages);
        } else {
            $kamars = kamar::oldest()->paginate($pages);
        }
        // $kamars = kamar::query()->when($keywords, function(Builder $builder) use ($request) {
        //     $builder->where('nama_penghuni', 'like', "%{$keywords}%");
        // })->simplePaginate($pages);

        // $kamars = DB::table('kamars')->where('nama_penghuni', 'like', "%$keywords%")->paginate($pages);
        // $kamars = kamar::oldest()->paginate($pages);

        return view('kamar.index', compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create', [
            'title' => "Tambah",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required|min:3|max:255',
            // 'luas' => 'required',
            'jenis' => 'required'
        ], [
            // 'name.required' => "Nama Wajib Diisi",
            // 'name.min' => "Minimal nama 3 karakter",
            // 'name.max' => "Maksimal nama 255 Karakter",
            // 'luas.required' => "luas Wajib Diisi",
            'jenis.required' => "jenis Wajib Diisi",
        ]);

        // return $request;
        // $new_kamar = kamar::create($request->except(['_token']));
        // $new_kamar = kamar::create([
        //     // 'nama_penghuni' => $request->name,
        //     // 'luas_kamar' => $request->luas,
        //     'jenis_kamar' => $request->jenis,
        // ]);

        $new_kamar = kamar::create([
            'jenis_kamar' => $request->jenis,
        ]);

        if ($new_kamar) {
            return redirect()->route('kamar.index')->with(['info' => "Berhasil Menambahkan Kamar"]);
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
        $select_kamar = kamar::where('id', $id)->first();
        
        return view('kamar.edit', compact('select_kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis' => 'required',
        ], [
            'jenis.required' => "Status Wajib Diisi",
        ]);
        // $update_kamar = kamar::create($request->except(['_token', '_method']));

        $update_kamar = DB::table('kamars')->where('id', $id)->update([
            'jenis_kamar' => $request->jenis,
        ]);
        
        if ($update_kamar) {
            return redirect()->route('kamar.index')->with(['info' => "Berhasil Update Data Kamar"]);
        } else {
            return back()->with(['error' => "Gagal Update Data Kamar"]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $delete_kamar = DB::where('id', $id);
        $delete_kamar = DB::table('kamars')->where('id', $id);
        $delete_kamar->delete();
        return back()->with(['info' => "Data Kamar Berhasil DiHapus"]);
    }
}
