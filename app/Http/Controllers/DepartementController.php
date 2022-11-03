<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartementController extends Controller
{
    public function index() {
        $datas = DB::select('select * from departement');

        return view('departement.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('departement.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_departement' => 'required',
            'nama_departement' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO departement(id_departement, nama_departement ) VALUES (:id_departement, :nama_departement)',
        [
            'id_departement' => $request->id_departement,
            'nama_departement' => $request->nama_departement,
       
        ]
        );

        // Menggunakan laravel eloquent
        // departement::create([
        //     'id_departement' => $request->id_departement,
        //     'nama_departement' => $request->nama_departement,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('departement.index')->with('success', 'Data departement berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('departement')->where('id_departement', $id)->first();

        return view('departement.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_departement' => 'required',
            'nama_departement' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE departement SET id_departement = :id_departement, nama_departement = :nama_departement WHERE id_departement = :id',
        [
            'id' => $id,
            'id_departement' => $request->id_departement,
            'nama_departement' => $request->nama_departement

        ]
        );

        // Menggunakan laravel eloquent
        // departement::where('id_departement', $id)->update([
        //     'id_departement' => $request->id_departement,
        //     'nama_departement' => $request->nama_departement,
        //     'alamat' => $request->alamat,
        //     'no_telfon' => $request->no_telfon,
        //     'jenis_kelamin' => Hash::make($request->jenis_kelamin),
        // ]);

        return redirect()->route('departement.index')->with('success', 'Data departement berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM departement WHERE id_departement = :id_departement', ['id_departement' => $id]);

        // Menggunakan laravel eloquent
        // departement::where('id_departement', $id)->delete();

        return redirect()->route('departement.index')->with('success', 'Data departement berhasil dihapus');
    }


}
