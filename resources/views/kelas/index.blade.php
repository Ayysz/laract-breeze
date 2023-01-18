@extends('main.layout')
@section('content')
    <center>
        <b>
            <h2>LIST DATA KELAS</h2>
            <a href="/kelas/create" class="button-primary">TAMBAH DATA</a>
            @include('layouts.info')

            <table cellpadding="10">
                <tr>
                    <th>NO</th>
                    <th>KELAS</th>
                    <th>JURUSAN</th>
                    <th>ACTION</th>
                </tr>
                @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->jurusan->nama_jurusan }}</td>
                        <td>
                            <a href="/kelas/edit/{{$k->id}}" class="button-primary">EDIT</a>
                            <a href="/kelas/destroy/{{$k->id}}" class="button-primary" onclick="return confirmm('Yakin Hapus?')">HAPUS</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </b>
    </center>
@endsection