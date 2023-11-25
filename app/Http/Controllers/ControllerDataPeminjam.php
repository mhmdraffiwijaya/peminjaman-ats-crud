<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\datapeminjam;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerDataPeminjam extends Controller
{

    public function viewdatapeminjam()
    {
        $data = datapeminjam::all();
        return view('datapeminjam.viewdatapeminjam', ['data' => $data]);
    }
    public function inputdatapeminjam()
    {
        return view('datapeminjam.inputdatapeminjam');
    }

    public function savedatapeminjam(Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'jumlah.required' => 'jumlah tidak boleh kosong!',
            'namapeminjam.required' => 'namapeminjam tidak boleh kosong!',
            'tgl.required' => 'tgl tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'jumlah' => 'required',
            'namapeminjam' => 'required',
            'tgl' => 'required',
            'fotopeminjam' => 'required', 'fotopeminjam|image|mimes:jpeg,png,jpg|max:2048', 'Masukan Foto'
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('fotopeminjam');
        if (empty($file)) {
            datapeminjam::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'jumlah' => $x->jumlah,
                'namapeminjam' => $x->namapeminjam,
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

            datapeminjam::create([
                'idats' => $x->idats,
                'namaats' => $x->namaats,
                'jumlah' => $x->jumlah,
                'namapeminjam' => $x->namapeminjam,
                'tgl' => $x->tgl,
                'fotopeminjam' => $pathPublic,
            ]);
        }
        Alert::success('Berhasil Menambah datapeminjam');
        return redirect('/viewdatapeminjam')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data datapeminjam
    public function editdatapeminjam($iddatapeminjam)
    {
        $datadatapeminjam = datapeminjam::find($iddatapeminjam);
        return view("datapeminjam.editdatapeminjam", ['data' => $datadatapeminjam]);
    }

    //Update data datapeminjam
    public function updatedatapeminjam($id, Request $x)
    {
        //Validasi
        $messages = [
            'idats.required' => 'idats tidak boleh kosong!',
            'namaats.required' => 'namaats tidak boleh kosong!',
            'jumlah.required' => 'jumlah tidak boleh kosong!',
            'namapeminjam.required' => 'namapeminjam tidak boleh kosong!',
            'tgl.required' => 'tgl tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'idats' => 'required',
            'namaats' => 'required',
            'jumlah' => 'required',
            'namapeminjam' => 'required',
            'tgl' => 'required',
            'fotopeminjam' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ], $messages);

        $file = $x->file('fotopeminjam');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = datapeminjam::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        datapeminjam::where("id", "$id")->update([
            'idats' => $x->idats,
            'namaats' => $x->namaats,
            'jumlah' => $x->jumlah,
            'namapeminjam' => $x->namapeminjam,
            'tgl' => $x->tgl,
            'fotopeminjam' => $path,
        ]);
        Alert::success('Berasil Mengubah datapeminjam');
        return redirect('/viewdatapeminjam')->with('toast_success', 'Data berhasil di update!');
    }

    //hapus datapeminjam
    public function deletedatapeminjam($id)
    {
        try {
            $data = datapeminjam::where('id', $id)->first();
            File::delete($data->file);
            datapeminjam::where('id', $id)->delete();
            Alert::success('Berasil Menghapus datapeminjam');
            return redirect('/viewdatapeminjam')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::warning('Warning Terjadi error');
            return redirect('/viewdatapeminjam')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
