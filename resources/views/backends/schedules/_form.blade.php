<!-- Input (Select) for Classroom -->
<div class="form-group">
    <label class="form-label" for="classroom_id">Ruangan Kelas</label>
    {{ html()->select('classroom_id')->options($classrooms)->class(["form-control", "is-invalid" => $errors->has('classroom_id')])->id('classroom_id') }}
    @error('classroom_id')
    <div class="invalid-feedback">{{ $errors->first('classroom_id') }}</div>
    @enderror
</div>

<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="day">Day</label>
    {{ html()->text('day')->class(["form-control", "is-invalid" => $errors->has('day')])->id('day')->placeholder('Hari') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('day') }}</div>
    @enderror
</div>

<!-- Abbreviation Text Field Input -->
<div class="form-group">
    <label class="form-label" for="start_at">Mulai</label>
    {{ html()->text('start_at')->class(['form-control', 'is-invalid' => $errors->has('start_at')])->id('start_at')->placeholder('Jadwal Mulai') }}
    @error('abbreviation')
    <div class="invalid-feedback">{{ $errors->first('start_at') }}</div>
    @enderror
</div>

<!-- Abbreviation Text Field Input -->
<div class="form-group">
    <label class="form-label" for="end_at">Berakhir</label>
    {{ html()->text('end_at')->class(['form-control', 'is-invalid' => $errors->has('end_at')])->id('end_at')->placeholder('Jadwal Berakhir') }}
    @error('end_at')
    <div class="invalid-feedback">{{ $errors->first('end_at') }}</div>
    @enderror
</div>

<!-- Input (Select) for Fakultas -->
<div class="form-group">
    <label class="form-label" for="room_id">Ruangan</label>
    {{ html()->select('room_id')->options($rooms)->class(["form-control", "is-invalid" => $errors->has('room_id')])->id('faculty_id') }}
    @error('room_id')
    <div class="invalid-feedback">{{ $errors->first('room_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for National Code -->
<div class="form-group">
    <label class="form-label" for="period">Periode</label>
    {{ html()->text('period')->class(["form-control", "is-invalid" => $errors->has('period')])->id('period')->placeholder('Periode') }}
    @error('period')
    <div class="invalid-feedback">{{ $errors->first('period') }}</div>
    @enderror
</div>
