<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public  function index()
    {
        return view('sertifikat.index');
    }
    public  function data()
    {
        return view('sertifikat.data', [
            'sertifikat' => Sertifikat::get()
        ]);
    }

    public function simpan(Sertifikat $sertifikat, $nama = null)
    {
        if ($nama == null) {
            return redirect()->back()->with('failed', 'Belum ada nama yang di input');
        }

        if ($sertifikat->where('nama', $nama)->count()) {
            return redirect()->back()->with('failed', 'Nama Sudah Ada');
        }

        $sertifikat->create([
            'nama' => $nama,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    public function post(Sertifikat $sertifikat, Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:sertifikat'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.unique' => 'Nama sudah ada',
        ]);

        if ($request->button == 'simpan') {
            $sertifikat->create([
                'nama' => $request->nama,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } elseif ($request->button == 'pratinjau') {
            return view('sertifikat.pratinjau', [
                'nama' => $request->nama
            ]);
        } else {
            return redirect()->back()->with('error', 'Permintaan error');
        }
    }

    public function lihat(Sertifikat $sertifikat, $id = null)
    {
        $sertifikat = $sertifikat->find($id);

        if ($sertifikat) {
            return view('sertifikat.lihat', [
                'sertifikat' => $sertifikat
            ]);
        }
        return redirect()->back()->with('failed', 'Tidak menemukan data seritifikat');
    }

    public function hapus(Sertifikat $sertifikat, $id = null)
    {
        $sertifikat = $sertifikat->find($id);

        if ($sertifikat) {
            $sertifikat->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }
        return redirect()->back()->with('failed', 'Gagal menghapus data');
    }
}
