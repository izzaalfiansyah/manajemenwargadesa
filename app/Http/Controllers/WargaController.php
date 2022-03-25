<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Warga as Model;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data = Model::orderBy('nik')->get();
        $mutasi = Mutasi::orderBy('nama', 'asc')->get();

        return view('admin.warga', compact('data', 'mutasi'));
    }

    public function mutasi(Request $req)
    {
        $builder = Model::orderBy('nik');
        
        if (isset($req->status_kehidupan)) {
            $builder = $builder->where('status_kehidupan', $req->status_kehidupan);
        }

        $data = $builder->get();

        return view('admin.mutasi', compact('data'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, Model::rules);

        if ($req->file_ktp) {
            $fileKtp = $req->file('file_ktp');
            $fileKtpName = date('Ymdhis') . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(Model::fileKtpPath, $fileKtpName);
            $data['file_ktp'] = $fileKtpName;
        }

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');
        
        return redirect(url('/warga'));
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, Model::rules);
        
        $item = Model::find($id);

        if ($req->file_ktp) {
            $fileKtp = $req->file('file_ktp');
            $fileKtpName = date('Ymdhis') . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(Model::fileKtpPath, $fileKtpName);
            $data['file_ktp'] = $fileKtpName;

            @unlink(public_path(Model::fileKtpPath . $item->file_ktp));
        }
        
        $item->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect(url($req->redirect ? $req->redirect : '/warga'));
    }

    public function destroy($id)
    {
        $item = Model::find($id);
        @unlink(public_path(Model::fileKtpPath . $item->file_ktp));
        $item->delete($id);
        $this->notif('data berhasil dihapus', 'success');

        return redirect(url('/warga'));
    }
}
