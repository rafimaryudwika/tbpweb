@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Semester' => route('backend.semesters.index'),
        'Index' => '#'
    ]) !!}
@endsection



@section('content')
<div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->form('POST', route('backend.semesters.store'))->acceptsFiles()->open() }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                          <strong> <i class="cil-library-add"></i> Tambah Semester</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('klp11.semesters._form')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" value="Simpan" class="btn btn-primary"/>
                        </div>

                        {{ html()->form()->close() }}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection