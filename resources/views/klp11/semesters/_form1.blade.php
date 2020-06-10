<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="year">Tahun</label>
    {{ html()->text('year')->class(["form-control", "is-invalid" => $errors->has('year')])->id('year')->placeholder('Masukkan Tahun') }}
    @error('year')
    <div class="invalid-feedback">{{ $errors->first('year') }}</div>
    @enderror
</div>


<div class="form-group">
    <label class="form-label" for="period">Periode</label>
    {{ html()->select('period')->options($periodes)->class(["form-control", "is-invalid" => $errors->has('period')])->id('period')->placeholder('Pilih Status') }}
    @error('period')
    <div class="invalid-feedback">{{ $errors->first('period') }}</div>
    @enderror
</div>