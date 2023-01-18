@extends('main.layout')
@section('content')

    <center>
        <h2>TAMBAH DATA MATA PELAJARAN</h2>
        <form action="/nilai/store" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">NAMA GURU</td>
                    <td class="bar">
                        <select name="mengajar_id">
                            <option > --- nama pengajar</option>
                            @foreach ($mengajar as $m)
                                <option value="{{$m->id}}">
                                    {{ $m->guru->nama_guru }} -- {{$m->mapel->nama_mapel}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="bar">NAMA SISWA</td>
                    <td class="bar">
                        <select name="siswa_id">
                            <option >-- Nama Siswa</option>
                            @foreach ($siswa as $m )
                            <option value="{{$m->id}}">{{$m->nama_siswa}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <center>
                            <h3>NILAI</h3>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td class="bar">ULANGAN HARIAN</td>
                    <td class="bar">
                        <input type="number" name="uh" id="uh">
                    </td>
                </tr>
                <tr>
                    <td class="bar">ULANGAN TENGAH SEMESTER</td>
                    <td class="bar">
                        <input type="number" name="uts" id="uts">
                    </td>
                </tr>
                <tr>
                    <td class="bar">ULANGAN AKHIR SEMESTER</td>
                    <td class="bar">
                        <input type="number" name="uas" id="uas">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <button type="submit" class="button-primary">SIMPAN</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>


@endsection