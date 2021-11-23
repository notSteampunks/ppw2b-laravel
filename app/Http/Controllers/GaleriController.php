<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Buku;
use Intervention\Image\Facades\Image As Image;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas  = 4;
        $galeri = Galeri::orderBy('id','desc')->paginate($batas);
        $no     = $batas * ($galeri->currentPage() - 1);
        return view('galeri.galeri', compact(
            'galeri',
            'no'));
    }
    
    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }    

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_galeri'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan  = $request->keterangan;
        $galeri->id_buku     = $request->id_buku;
        
        $galeri->galeri_seo  = Str::slug($request->judul);

        $foto       = $request->foto;
        $namafile   = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('success_added', 'Galeri Buku berhasil disimpan');
    }

    //fungsi hapus galeri
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('success_deleted','Galeri Buku Berhasil Dihapus');
    }

    //fungsi edit galeri
    public function edit($id){
        $galeri = Galeri::find($id);
        $buku   = Buku::all();
        return view('galeri.edit', compact('galeri','buku'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_galeri'   => 'required|string',
            'keterangan'    => 'required|string',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
        ]);
        
        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan  = $request->keterangan;
        $galeri->id_buku     = $request->id_buku;
        
        $galeri->galeri_seo  = Str::slug($request->judul);


        $foto       = $request->foto;
        $namafile   = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $galeri->foto = $namafile;
        $galeri->update();
        return redirect('/galeri')->with('success_updated','Galeri Buku Berhasil Diupdate');
    }
}