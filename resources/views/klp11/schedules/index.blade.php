@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Jadwal' => route('backend.schedules.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.schedules.create'), 'cil-playlist-add', 'Tambah Jadwal') !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.schedules.create'), 'cil-playlist-add', 'Tambah Jadwal') !!}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Daftar Jadwal Kelas</strong>
        </div>

        <div class="card-body">
            <table class="table table-outline table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Jadwal</th>
                    <th>Ruang</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($Schedules as $Schedules)
                    <tr>
                        <td>{{ $Schedules->day }}</td>
                        <td></td>
                        <td>
                            {{ $Schedules->start_at }}
                            <br>
                            s/d
                            <br>
                            {{ $Schedules->end_at }}
                        </td>
                        <td>{{ $Schedules->ruang->name}}</td>
                        <td>{{ $Schedules->period }}</td>
                        <td>
                            {!! cui()->btn_edit(route('backend.schedules.edit', [$Schedules->id])) !!}
                            {!! cui()->btn_delete(route('backend.schedules.destroy', [$Schedules->id]), "Anda yakin ingin menghapus jadwal perkuliahan ini?") !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada jadwal</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection