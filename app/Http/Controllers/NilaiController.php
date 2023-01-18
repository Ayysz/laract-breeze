<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('nilai.index', [
            'nilai' => NIlai::all()
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
        // $mengajar = Mengajar::where('')
        return view('nilai.create', [
            'mengajar' => Mengajar::all(),
            'siswa' => Siswa::all()
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
            'mengajar_id' => 'required',
            'siswa_id' => 'required',
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
        ]);
        $request['na'] = $request['uh']+$request['uts']+$request['uas'];
        // dd($request);    
        Nilai::create($request->all());
        return redirect('/nilai/index')->with('success', "Data nilai baru berhasil ditambahkan");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
