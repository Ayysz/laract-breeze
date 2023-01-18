@extends('main.layout')
@section('content')

    <center>
        <b>
            <h2>LIST DATA NILAI</h2>
            <a href="/nilai/create" class="button-primary">TAMBAH DATA</a>
            @include('layouts.info')
            <table cellPadding="10">
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAMA GURU</th>
                    <th rowspan="2">MATA PELAJARAN</th>
                    <th rowspan="2">NAMA SISWA</th>
                    <th colspan="4">NILAI</th>
                    <th rowspan="2">ACTION</th>
                </tr>
                <tr>
                    <th>UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
                </tr>   


                @foreach ($nilai as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{  $n->mengajar->guru->nama_guru }}</td>
                    <td>{{  $n->mengajar->mapel->nama_mapel }}</td>
                    <td>{{  $n->siswa->nama_siswa }}</td>
                    <td>{{  $n->uh }}</td>
                    <td>{{  $n->uts }}</td>
                    <td>{{  $n->uas }}</td>
                    <td>{{  $n->na }}</td>
                    <td>
                        <a href="/nilai/edit/{{$n->id}}" class="button-warning">EDIT</a>
                        <a href="/nilai/destroy/{{$n->id}}" onClick="return confirm('Yakin Hapus?')" class="button-danger">HAPUS</a>
                    </td>
                </tr>
                @endforeach

            </table>
        </b>
    </center>

@endsection