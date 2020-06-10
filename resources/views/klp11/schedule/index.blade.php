@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Schedules' => route('backend.schedules.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.schedules.create'), 'cil-library-add', 'Tambah') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Kelas</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $class_schedules->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center"></th>
                            <th >Kode Kelas</th>
                            <th>Hari Kuliah</th>
                            <th>Mulai Kelas</th>
                            <th>Kelas Berakhir</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($class_schedules as $class_schedule)
                            <tr>
                                <td>{{ $class_schedule->classroom_id }}</td>
                                <td>{{ $class_schedule->day }}</td>
                                <td class="text-center">
                                        {!! cui()->btn_edit(route('backend.schedules.edit', [$class_schedules->id])) !!}
                                        {!! cui()->btn_delete(route('backend.schedules.destroy', [$class_schedules->id]), "Anda yakin akan menghapus data kelas ini?") !!}
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <h6 class="text-center">Tidak ada kelas</h6>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $class_schedules->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->

            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection