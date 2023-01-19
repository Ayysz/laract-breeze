@extends('main.layout')
@section('content')
    <center>
        <h2>EDIT DATA KELAS</h2>
        <form action="/kelas/update/{{$kelas->id}}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td class="bar">KELAS</td>
                    <td class="bar">
                        <input type="text" name="nama_kelas" value="{{$kelas->nama_kelas}}">
                    </td>
                </tr>
                <tr>
                    <td class="bar">JURUSAN</td>
                    <td class="bar">
                        <select name="jurusan_id">
                            <option>--Pilih Jurusan</option>
                            @foreach ($jurusan as $j)
                                <option value="{{$j->id}}" 
                                    {{$kelas->jurusan_id == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <button type="submit" class="button-primary">UBAH</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection