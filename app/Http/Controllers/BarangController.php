<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('crud.index', compact('barang'));
    }

    public function show(Barang $barang)
    {
        return view('crud.show',compact('barang'));
    }

    public function create(){
        return view('crud.tambah');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $barang = Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);
            
        if ($barang) {
            Session::flash('berhasil', 'Berhasil Menambah');
            return redirect()->route('index');
        }
        Session::flash('gagal', 'gagal Menambah');
        return redirect()->back();
    }
    
    public function edit(Barang $barang){
        return view('crud.edit', compact('barang'));
    }
    
    public function update(Request $request, Barang $barang){
        $validator = Validator::make($request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $barang->update($request->all());
            
        if ($barang) {
            Session::flash('berhasil', 'Berhasil Mengubah');
            return redirect()->route('index');
        }

        Session::flash('gagal', 'gagal Mengubah');
        return redirect()->back();
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
    
        if ($barang) {
            Session::flash('berhasil', 'Berhasil Menghapus Barang');
            return redirect()->route('index');
        }

        Session::flash('gagal', 'gagal Menghapus Barang');
        return redirect()->back();
    }
}
