<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris as Model;

class InventarisController extends Controller
{
    public function index()
    {
        $data = Model::orderBy('nama')->get();

        return view('admin.inventaris', compact('data'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, Model::rules);

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');

        return redirect('/inventaris');
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, Model::rules);

        Model::find($id)->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect('/inventaris');
    }

    public function destroy($id)
    {
        Model::destroy($id);

        return redirect('/inventaris');
    }
}
