<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDashboard extends Controller
{

    public function cobainput()
    {
        $data = User::all();
        return view('User.cobainput', ['data' => $data]);
    }

    public function viewuser()
    {
        $data = User::all();
        return view('User.viewuser', ['data' => $data]);
    }
    public function dashboard()
    {
        $data = User::all();
        return view('dashboard', ['data' => $data]);
    }
    public function inputuser()
    {
        return view('User.inputuser');
    }

    public function saveuser(Request $x)
    {
        //Validasi
        $messages = [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'level.required' => 'level user tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|min:4|max:100',
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('file');
        if (empty($file)) {
            User::create([
                'name' => $x->name,
                'email' => $x->email,
                'password' => Hash::make($x->password),
                'level' => $x->level,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            User::create([
                'name' => $x->name,
                'email' => $x->email,
                'password' => Hash::make($x->password),
                'level' => $x->level,
            ]);
        }
        Alert::success('Berasil Menambah User');
        return redirect('/viewuser')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data user
    public function edituser($idUser)
    {
        $dataUser = User::find($idUser);
        return view("User.edituser", ['data' => $dataUser]);
    }

    public function UpdateUser($id, Request $a)
    {
        $messages = ([
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'level.required' => 'level user tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);
        $cekValidasi = $a->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'level' => 'required',
                'password' => 'required',
            ],
            $messages
        );

        User::where("id", "$id")->update([
            'name' => $a->name,
            'email' => $a->email,
            'password' => Hash::make($a->password),
            'level' => $a->level,
        ], $cekValidasi);
        Alert::success('Berasil Mengubah User');
        return redirect('/viewuser')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus user
    public function deleteuser($id)
    {
        try {
            $data = User::where('id', $id)->first();
            File::delete($data->file);
            User::where('id', $id)->delete();
            Alert::success('Berasil Menghapus User');
            return redirect('/viewuser')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewuser')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
