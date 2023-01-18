<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mengajar.index', [
            'mengajar' => Mengajar::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'mapel' => Mapel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        Mengajar::create($request->all());
        return redirect('/mengajar/index')->with('Berhasil menambah data baru');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengajar $mengajar)
    {
        //
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'mapel' => Mapel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        //
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $mengajar->update($request->all());
        return redirect('/mengajar/index')->with('Berhasil menambah data baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        //
        $nilai = Nilai::where('mengajar_id', $mengajar->id)->first();

        if ($nilai) return back()->with('error', "$mengajar->id masih digunakan di menu nilai");

        $mengajar->delete();

        return redirect('/mengajar/index')->with('success', 'Data mengajar $mengjar->id telah berhasil dihapus');


    }
}
