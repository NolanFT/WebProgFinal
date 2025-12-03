<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    //
    function home(){
        //
        return view('home');
    }

    function create(Request $request){
        //
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'score' => 'required'
        ]);
        
        $mahasiswa = new Mahasiswa();
        $mahasiswa->name = $validateData['name'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->score = $validateData['score'];
        $mahasiswa->save();

        return view('pesan')->with('pesan',"Data berhasil disimpan");
    }

    function read(){
        //
        $mahasiswas = Mahasiswa::all();

        return view('read', compact('mahasiswas'));
    }

    function edit(Request $request){
        //
        $mahasiswa = Mahasiswa::find($request->id);
        $id = $mahasiswa->id;
        $name = $mahasiswa->name;
        $email = $mahasiswa->email;
        $score = $mahasiswa->score;

        return view('edit', compact('id','name','email','score'));
    }

    function update(Request $request){
        //
        $validateData = $request->validate([
            'score' => 'required',
        ]);

        Mahasiswa::where('id',$request->id)->update($validateData);

        return view('pesan')->with('pesan', "Score berhasil diupdate");
    }

    function delete(Request $request){
        //
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->delete();

        return view('pesan')->with('pesan', "Data berhasil dihapus");
    }
}
