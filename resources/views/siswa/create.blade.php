@extends('main.layout')
@section('content')
    <center>
        <h2>TAMBAH DATA SISWA</h2>
        <form action="/siswa/store" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">NIS</td>
                    <td class="bar">
                        <input type="text" name="nis">
                    </td>
                </tr>
                <tr>
                    <td class="bar">NAMA SISWA</td>
                    <td class="bar">
                        <input type="text" name="nama_siswa">
                    </td>
                </tr>
                <tr>
                    <td class="bar">JENIS KELAMIN</td>
                    <td class="bar">
                        <input type="radio" name="jk" value="L">Laki-laki
                        <input type="radio" name="jk" value="P">Perempuan
                    </td>
                </tr>
                <tr>
                    <td class="bar">ALAMAT</td>
                    <td class="bar">
                        <textarea name="alamat" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="bar">KELAS</td>
                    <td class="bar">
                        <select name="kelas_id">
                            <option>--Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="bar">PASSWORD</td>
                    <td class="bar">
                        <input type="password" name="password">
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