<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus as Model;

class PengurusController extends Controller
{
    public function index()
    {
        $data = Model::first();

        return view('admin.pengurus', compact('data'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, Model::rules);

        $data['seksi_seksi'] = [];
        foreach ($req->seksi_seksi as $key => $item) {
            if ($item['bagian'] && $item['petugas']) {
                $data['seksi_seksi'][] = $item;
            }
        }

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');

        return redirect('/pengurus');
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, Model::rules);

        $data['seksi_seksi'] = [];
        foreach ($req->seksi_seksi as $key => $item) {
            if ($item['bagian'] && $item['petugas']) {
                $data['seksi_seksi'][] = $item;
            }
        }

        Model::find($id)->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect('/pengurus');
    }

    public function destroy($id)
    {
        Model::destroy($id);

        return redirect('/pengurus');
    }
}
