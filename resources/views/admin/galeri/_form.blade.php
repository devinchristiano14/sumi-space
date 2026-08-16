<div class="mb-3">

    <label class="form-label">
        Paket Foto
    </label>

    <select
        name="paket_foto_id"
        class="form-select"
        required>

        <option value="">-- Pilih Paket --</option>

        @foreach($pakets as $paket)

            <option
                value="{{ $paket->id }}"
                {{ old('paket_foto_id', $galeri->paket_foto_id ?? '') == $paket->id ? 'selected' : '' }}>

                {{ $paket->nama_paket }}

            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label class="form-label">

        Judul Foto

    </label>

    <input
        type="text"
        name="judul"
        class="form-control"
        value="{{ old('judul', $galeri->judul ?? '') }}"
        required>

</div>

<div class="mb-3">

    <label class="form-label">

        Upload Foto

    </label>

    <input
        type="file"
        name="gambar"
        class="form-control">

</div>

@if(isset($galeri))

<div class="mb-3">

    <img
        src="{{ asset('uploads/galeri/'.$galeri->gambar) }}"
        width="220"
        class="rounded shadow">

</div>

@endif

<button class="btn btn-sumi">

    Simpan

</button>

<a href="{{ route('galeri.index') }}"
class="btn btn-secondary">

    Kembali

</a>