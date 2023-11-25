<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\dataats;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDataAts extends Controller
{

    public function viewdataats()
    {
        $data = dataats::all();
        return view('dataats.viewdataats', ['data' => $data]);
    }
    public function inputdataats()
    {
        return view('dataats.inputdataats');
    }

    public function savedataats(Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'stokats.required' => 'stokats tidak boleh kosong!',
            //'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'stokats' => 'required',
            //'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('file');
        if (empty($file)) {
            dataats::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'stokats' => $x->stokats,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            dataats::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'stokats' => $x->stokats,
            ]);
        }
        Alert::success('Berasil Menambah dataats');
        return redirect('/viewdataats')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data dataats
    public function editdataats($iddataats)
    {
        $datadataats = dataats::find($iddataats);
        return view("dataats.editdataats", ['data' => $datadataats]);
    }

    //Update data dataats
    public function updatedataats($iddataats, Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'stokats.required' => 'stokats tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'stokats' => 'required',
        ], $messages);

        $file = $x->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = dataats::where('id', $iddataats)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        dataats::where("id", "$iddataats")->update([
            'idats' => $x->idats,
            'namaats' => $x->namaats,
            'stokats' => $x->stokats,
        ]);
        Alert::success('Berasil Mengubah dataats');
        return redirect('/viewdataats')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus dataats
    public function deletedataats($id)
    {
        try {
            $data = dataats::where('id', $id)->first();
            File::delete($data->file);
            dataats::where('id', $id)->delete();
            Alert::success('Berasil Menghapus dataats');
            return redirect('/viewdataats')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewdataats')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
