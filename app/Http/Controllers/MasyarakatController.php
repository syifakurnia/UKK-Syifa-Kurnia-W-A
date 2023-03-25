<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = DB::table('pengaduan')->orderBy('id')->limit(1);
        return view('dashboard', compact('latest'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);
    
           $name = $request->foto->getClientOriginalName();
           $path = $request->foto->store('public/images');

        $data = Admin::create([
            'foto' => $path,
            'isi_laporan' => $request->isi_laporan,
            'tgl_tanggapan' => $request->tgl_tanggapan,
            'tgl_kejadian' => $request->tgl_kejadian,
            'tanggapan' => $request->tanggapan,
            'nik' => $request->nik,
            'nama_pengadu' => $request->nama_pengadu,
        ]);
        return redirect()->route('riwayat');
    }

    public function show()
    {
        $data = Admin::get()->where('akses', '=', 'public' && 'nik', '=', Auth::user()->nik);
        return view('masyarakat.dataRiwayat',compact('data'))->with('i',(request()->input('page',1) -1) *5);
    }

    public function dataRiwayat()
    {
        $data = Admin::get()->where('nik', '=', Auth::user()->nik);
        return view('masyarakat.riwayat', compact('data'))->with('i',(request()->input('page',1) -1) *5);
    }

    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.tanggapan', compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $admin = Admin::findOrFail($id)->update([
            'tanggapan' => $request->tanggapan,
            'status' => 'selesai',
        ]);
        return redirect()->route('dataPengaduan');
    }

    public function destroy($id):RedirectResponse
    {
        $post = User::findorFail($id);
        $post->delete();
        return redirect()->route('dataPetugas');
    }
}