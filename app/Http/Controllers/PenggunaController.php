<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index', [
            'pengguna' => User::get(),
        ]);
    }

    public function tambah(User $user, $id = null)
    {
        if ($id != null) {
            $user =  $user->find($id);
        }

        return view('pengguna.tambah', [
            'pengguna' => $user
        ]);
    }

    public function simpan(Request $request, User $user, $id = null)
    {
        if ($id == null) {
            $request->validate([
                'nama' => 'required',
                'nama_pengguna' => 'required|unique:users,nama_pengguna',
                'kata_sandi' => 'required',
            ]);
            $user->password = Hash::make($request->kata_sandi);
        } else {
            $request->validate([
                'nama' => 'required',
                'nama_pengguna' => 'required|unique:users,nama_pengguna,' . $id,
            ]);
            $user =  $user->find($id);
            if ($request->kata_sandi) {
                $user->password = Hash::make($request->kata_sandi);
            }
        }

        $user->nama = $request->nama;
        $user->nama_pengguna = $request->nama_pengguna;
        $user->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan');
    }

    public function hapus(User $user, $id)
    {
        if ($id == Auth::user()->id) {
            return redirect()->back()->with('error', 'Gagal menghapus');
        }
        $user = $user->find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}
