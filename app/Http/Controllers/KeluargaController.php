<?php

namespace App\Http\Controllers;

use App\Models\Keluarga as Model;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $data = Model::orderBy('nomor_kk')->get();

        return view('admin.keluarga', compact('data'));
    }

    public function show($id)
    {
        $data = Model::find($id);
        $warga = \App\Models\Warga::orderBy('nama', 'asc')->get();

        return view('admin.keluarga_show', compact('data', 'warga'));
    }

    public function create()
    {
        $warga = \App\Models\Warga::orderBy('nama', 'asc')->get();

        return view('admin.keluarga_create', compact('warga'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, array_merge(Model::rules, [
            'file_kk' => 'required|file',
        ]));

        $fileKtp = $req->file('file_kk');
        $fileKtpName = date('Ymdhis') . '.' . $fileKtp->getClientOriginalExtension();
        $fileKtp->move(Model::fileKkPath, $fileKtpName);
        $data['file_kk'] = $fileKtpName;

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');
        
        return redirect(url('/keluarga'));
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, Model::rules);
        
        $item = Model::find($id);

        if ($req->file_kk) {
            $fileKtp = $req->file('file_kk');
            $fileKtpName = date('Ymdhis') . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(Model::fileKkPath, $fileKtpName);
            $data['file_kk'] = $fileKtpName;

            @unlink(public_path(Model::fileKkPath . $item->file_kk));
        }
        
        $item->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect(url($req->redirect ? $req->redirect : '/keluarga'));
    }

    public function destroy($id)
    {
        $item = Model::find($id);
        @unlink(public_path(Model::fileKkPath . $item->file_kk));
        $item->delete($id);
        $this->notif('data berhasil dihapus', 'success');

        return redirect(url('/keluarga'));
    }
}
