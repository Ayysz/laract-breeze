@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA JURUSAN</h2>
            <a href="/jurusan/create" class="button-primary">TAMBAH DATA</a>
            @include('layout.info')

            <table cellpadding="10">
                <tr>
                    <th>NO</th>
                    <th>JURUSAN</th>
                    <th>ACTION</th>
                </tr>
                @foreach ($jurusan as $j)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $j->nama_jurusan }} </td>
                    <td>
                        <a href="/jurusan/edit/{{$j->id}}" class="button-warning">EDIT</a>
                        <a href="/jurusan/destroy/{{$j->id}}" class="button-warning" onclick="return confirm('Yakin inigin menghapus?')">HAPUS</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </b>
    </center>
@endsection