@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Semester' => route('backend.semesters.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('semesters_manage')
    {!! cui()->toolbar_btn(route('backend.semesters.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.semesters.index'), 'cil-list', 'List') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">

                        {{ html()->modelForm($semester, 'PUT', route('backend.semesters.update', $semester->id))->acceptsFiles()->open() }}

                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Semester</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('klp11.semesters._form1')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection