<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutasi as Model;

class MutasiController extends Controller
{
    public function index()
    {
        $data = Model::orderBy('nama')->get();

        return view('admin.mutasi', compact('data'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, Model::rules);

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');

        return redirect('/mutasi');
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, Model::rules);

        Model::find($id)->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect('/mutasi');
    }

    public function destroy($id)
    {
        Model::destroy($id);

        return redirect('/mutasi');
    }
}
