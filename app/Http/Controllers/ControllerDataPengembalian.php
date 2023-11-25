<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\datapengembalian;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDataPengembalian extends Controller
{

    public function viewdatapengembalian()
    {
        $data = datapengembalian::all();
        return view('datapengembalian.viewdatapengembalian', ['data' => $data]);
    }
    public function inputdatapengembalian()
    {
        return view('datapengembalian.inputdatapengembalian');
    }

    public function savedatapengembalian(Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'jumlah.required' => 'jumlah tidak boleh kosong!',
            'namapengembalian.required' => 'namapengembalian tidak boleh kosong!',
            'tgl.required' => 'tgl tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'jumlah' => 'required',
            'namapengembalian' => 'required',
            'tgl' => 'required',
            'fotopengembalian' => 'required', 'fotopengembalian|image|mimes:jpeg,png,jpg|max:2048', 'Masukan Foto'
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('fotopengembalian');
        if (empty($file)) {
            datapengembalian::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'jumlah' => $x->jumlah,
                'namapengembalian' => $x->namapengembalian,
                'tgl' => $x->tgl,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            datapengembalian::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'jumlah' => $x->jumlah,
                'namapengembalian' => $x->namapengembalian,
                'tgl' => $x->tgl,
                'fotopengembalian' => $pathPublic,
            ]);
        }
        Alert::success('Berhasil Menambah datapengembalian');
        return redirect('/viewdatapengembalian')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data datapengembalian
    public function editdatapengembalian($iddatapengembalian)
    {
        $datadatapengembalian = datapengembalian::find($iddatapengembalian);
        return view("datapengembalian.editdatapengembalian", ['data' => $datadatapengembalian]);
    }

    //Update data datapengembalian
    public function updatedatapengembalian($id, Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'jumlah.required' => 'jumlah tidak boleh kosong!',
            'namapengembalian.required' => 'namapengembaliantidak boleh kosong!',
            'tgl.required' => 'tgl tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'jumlah' => 'required',
            'namapengembalian' => 'required',
            'tgl' => 'required',
            'fotopengembalian' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ], $messages);

        $file = $x->file('fotopengembalian');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = datapengembalian::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        datapengembalian::where("id", "$id")->update([
            'idats' => $x->idats,
            'namaats' => $x->namaats,
            'jumlah' => $x->jumlah,
            'namapengembalian' => $x->namapengembalian,
            'tgl' => $x->tgl,
            'fotopengembalian' => $path,
        ]);
        Alert::success('Berasil Mengubah datapengembalian');
        return redirect('/viewdatapengembalian')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus datapengembalian
    public function deletedatapengembalian($id)
    {
        try {
            $data = datapengembalian::where('id', $id)->first();
            File::delete($data->file);
            datapengembalian::where('id', $id)->delete();
            Alert::success('Berasil Menghapus datapengembalian');
            return redirect('/viewdatapengembalian')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewdatapengembalian')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
