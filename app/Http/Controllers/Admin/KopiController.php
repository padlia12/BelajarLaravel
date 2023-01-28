<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kopi;
use Illuminate\Http\Request;

class KopiController extends Controller
{
    public function create(){
        return view('Admin.kopi.Create');
        //untuk mengambil nilai yang ada di view
    }
    public function store(Request $request){
        $this->validate($request,[
            'Name'=> 'required',
            'price'=> 'required',
            'brand'=> 'required',
        ],[
            'Name.required' => 'nama belum dimasukkan',
            'price.required' => 'harga belum dimasukkan',
            'brand.required' => 'merek belum dimasukkan',
        ]);

        Kopi::Create($request->all());
        return redirect()->Route('kopi-index')->with('status', 'Sukses Insert Data Kopi'); 
    }
    public function index(){
        //menampilkan semua data
        //select * from kopi limit 5
        $kopi = Kopi::paginate(3);
        //kode untuk menampilkan debuggin(apakah datanya sudah ditanggap atau tidak)
        //return response()->$_ENV
        return view('Admin.kopi.index', compact("kopi"));
    }
    public function delete($id){
        $kopi = Kopi::where("id", $id)->first();
        $kopi->delete();

        return redirect()->Route("kopi-index")->with('status', 'Sukses Delete Data Kopi'); ;
    }
    public function edit($id){
        $kopi = Kopi::where("id", $id)->first();
        return view('Admin.kopi.edit', compact("kopi"));//menampilkan view
    }
    public function update(Request $request, $id){
        $kopi = Kopi::where("id", $id)->first();//first pilih satu berdasarkan id
        $kopi->update($request->all());

        return redirect()->route("kopi-index")->with('status', 'Sukses Update Data Kopi'); ;
    }

}