<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from pegawai');

        return view('pegawai.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pegawai.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'jenis_kelamin' => 'required',
            'id_departement' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pegawai(id_pegawai, nama_pegawai, alamat, no_telfon, jenis_kelamin, id_departement) VALUES (:id_pegawai, :nama_pegawai, :alamat, :no_telfon, :jenis_kelamin, :id_departement)',
        [
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_telfon' => $request->no_telfon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_departement' => $request->id_departement
        ]
        );

        // Menggunakan laravel eloquent
        // pegawai::create([
        //     'id_pegawai' => $request->id_pegawai,
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pegawai')->where('id_pegawai', $id)->first();

        return view('pegawai.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'jenis_kelamin' => 'required',
            'id_departement' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pegawai SET id_pegawai = :id_pegawai, nama_pegawai = :nama_pegawai, alamat = :alamat, no_telfon = :no_telfon, jenis_kelamin = :jenis_kelamin, id_departement = :id_departement WHERE id_pegawai = :id',
        [
            'id' => $id,
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_telfon' => $request->no_telfon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_departement' => $request->id_departement
        ]
        );

        // Menggunakan laravel eloquent
        // pegawai::where('id_pegawai', $id)->update([
        //     'id_pegawai' => $request->id_pegawai,
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pegawai WHERE id_pegawai = :id_pegawai', ['id_pegawai' => $id]);

        // Menggunakan laravel eloquent
        // pegawai::where('id_pegawai', $id)->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }


}
