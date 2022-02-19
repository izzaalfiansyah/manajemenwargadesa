<?php

namespace App\Http\Controllers;

use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    const rules = [
        'nama' => 'required|max:50',
        'alamat' => 'required',
        'telepon' => 'required|numeric',
        'role' => 'required|in:1,2',
    ];
    
    const authRules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function index(Request $req)
    {
        $data = Model::all();

        return view('admin.user', compact('data'));
    }

    public function show($id = '')
    {
        $data = Model::find($id ? $id : Session::get('id'));

        return view('admin.profil', compact('data'));
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, array_merge($this::rules, $this::authRules));
        $data['password'] = Hash::make($req->password);

        Model::create($data);
        $this->notif('data berhasil ditambah', 'success');
        
        return redirect(url('/user'));
    }

    public function update(Request $req, $id)
    {
        $data = $this->validate($req, $this::rules);
        
        Model::find($id)->update($data);
        $this->notif('data berhasil diedit', 'success');

        return redirect(url($req->redirect ? $req->redirect : '/user'));
    }

    public function authUpdate(Request $req, $id)
    {
        $rules = $this::authRules;
        unset($rules['password']);
        
        $data = $this->validate($req, $rules);

        if ($req->password) {
            $data['password'] = Hash::make($req->password);
        }

        Model::find($id)->update($data);
        $this->notif('autentikasi berhasil diedit', 'success');

        return redirect(url($req->redirect ? $req->redirect : '/user'));
    }

    public function login(Request $req)
    {
        $this->validate($req, $this::authRules);

        $data = Model::where('username', $req->username)->get();

        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                if (Hash::check($req->password, $item->password)) {
                    $this->notif('berhasil login', 'success');
                    Session::put('id', $item->id);

                    return redirect(url('/dashboard'));
                }
            }

            $this->notif('password salah', 'danger');
        } else {
            $this->notif('username tidak ditemukan', 'danger');
        }

        return redirect(url('/login'));
    }

    public function destroy($id)
    {
        Model::destroy($id);
        $this->notif('data berhasil dihapus', 'success');

        return redirect(url('/user'));
    }
}
