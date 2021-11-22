<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Buku;
use Intervention\Image\Facades\Image As Image;
use Illuminate\Support\Str;
use App\Post;

class BukuController extends Controller
{
    public function index(){
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $banyak_buku = Buku::count();
        $jumlah_buku = Buku::sum('harga');
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.index', compact(
            'data_buku',
            'banyak_buku',
            'jumlah_buku',
            'no'));
        }

    public function create(){
        return view('buku.create');
        }    

    public function store(Request $request){
        $this->validate($request,[
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date',
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('success_added','Data Buku Berhasil disimpan');
        }  

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('success_deleted','Data Buku Berhasil Dihapus');
        }

    public function edit($id){
        $buku = Buku::find($id);
        return view('buku.edit', compact(
            'buku'
        ));
        }

    public function update(Request $request, $id){
        $this->validate($request,[
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date',
            'foto'          =>'required|image|mimes:jpeg,jpg,png',
        ]);
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        $buku->buku_seo  = Str::slug($request->judul);

        $foto       = $request->foto;
        $namafile   = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $buku->foto = $namafile;

        $buku->update();
        return redirect('/buku')->with('success_updated','Data Buku Berhasil Diupdate');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $banyak_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.search', compact('banyak_buku','data_buku','no','cari'));
        }  

    public function __construct(){
        $this->middleware('auth');
    }

    public function buku(){
        return view('buku.buku', [
            'bukus' => Buku::paginate(12)
        ]);
    }

    public function galbuku($title){
        $bukus      = Buku::where('buku_seo', $title)->first();
        $galeris    = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        $post       = Post::where('book_id', $bukus->id)->get();

        return view('/buku/galeri', compact(
            'bukus',
            'galeris',
            'post'));
    }

    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('like');
        Return back();
    }
}