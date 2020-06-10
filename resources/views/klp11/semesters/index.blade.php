@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Semester' => route('backend.semesters.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.semesters.create'), 'cil-playlist-add', 'Tambah') !!}
@endsection


@section('content')
<div class="card">
  
  <div class="card-header">
            <strong>Daftar Semester</strong>
        </div>
  <div class="card-body">
  <table class="table table-outline table-hover">
    <thead class="thead-light">
        <tr>
            <th>Year</th>
            <th>Periode</th>
            <th>Aktif</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="sortBy(year)">
    @foreach($semesters as $semester)
        <tr>
            <td>{{ $semester->year }}</td>
            @if ($semester->period=="1")
            <td>Ganjil</td>
            @else
            <td>Genap</td>
            @endif
            @if ($semester->aktif=="1")
            <td><button type="button" class="btn btn-primary" style="text-align: center;">Aktif</button></td>
            @else
            <td>
                <form method="POST" action="{{route('backend.semesters.activate', [$semester->id])}}">
                    @csrf
                    <input type="submit" value="Aktifkan Semester" class="btn btn-secondary">
                </form>
            </td>
            @endif 
            <td>
                {!! cui()->btn_edit(route('backend.semesters.edit', [$semester->id])) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  </div>

  </div>
</div>

@endsection