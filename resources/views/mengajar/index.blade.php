@extends('main.layout')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MENGJAR</h2>
            <a href="/mengajar/create" class="button-primary">TAMBAH DATA</a>
            
            @include('layout.main')

            <table cellpadding="10">
                <tr>
                    <th>NO</th>
                    <th>GURU </th>
                    <th>MATA PELAJARAN</th>
                    <th>KELAS</th>
                    <th>ACTION</th>
                </tr>
                @foreach ($mengajar as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->guru->nama_guru }}</td>
                        <td>{{ $m->mapel->nama_mapel }}</td>
                        <td>{{ $m->kelas->nama_kelas }}</td>
                        <td>
                            <a href="/mengajar/edit/{{$m->id}}" class="button-warning">EDIT</a>
                            <a href="/mengajar/destroy/{{$m->id}}" class="button-danger" onclick="return confirm('Yakin Hapus?')">HAPUS</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </b>
    </center>
@endsection