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
                @forelse($schedules as $schedules)
                    <tr>

                        @if ($schedules->day=="1")
                        <td>Senin</td>
                        @elseif ($schedules->day=="2")
                        <td>Selasa</td>
                        @elseif ($schedules->day=="3")
                        <td>Rabu</td>
                        @elseif ($schedules->day=="4")
                        <td>Kamis</td>
                        @elseif ($schedules->day=="5")
                        <td>Jumat</td>
                        @endif
                        <td>{{ $schedules->matkul->name}}</td>
                        <td>
                            {{ $schedules->start_at }}
                            <br>
                            s/d
                            <br>
                            {{ $schedules->end_at }}
                        </td>
                        <td>{{ $schedules->ruang->name}}</td>
                        <td>{{ $schedules->period }}</td>
                        <td>
                            {!! cui()->btn_edit(route('backend.schedules.edit', [$schedules->id])) !!}
                            {!! cui()->btn_delete(route('backend.schedules.destroy', [$schedules->id]), "Anda yakin ingin menghapus jadwal perkuliahan ini?") !!}
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